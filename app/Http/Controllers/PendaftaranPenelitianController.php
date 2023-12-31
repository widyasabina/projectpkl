<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranPenelitian;
use App\Models\Balai;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Mail\PendaftaranMagangNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\kirimEmail;

class PendaftaranPenelitianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the form

        $pendaftaranMagan = PendaftaranPenelitian::paginate(15);

    // Query to retrieve data with search criteria
    $pendaftaranMagang = PendaftaranPenelitian::with(['mahasiswa', 'magang.balai'])
        ->whereHas('magang', function ($query) {
            $query->where('deskripsi', 'Penelitian');
        })
        ->when($search, function ($query) use ($search) {
            // Add search conditions here, you can search by mahasiswa's name or any other field
            $query->whereHas('mahasiswa', function ($subquery) use ($search) {
                $subquery->where('nama', 'like', '%' . $search . '%');
            });
        })
        ->paginate(15);

    return view('penelitian.index', compact('pendaftaranMagang','search','pendaftaranMagan'));
    }

    public function show($id)
    {
        $pendaftaranMagang = PendaftaranPenelitian::with(['mahasiswa', 'magang.balai'])->find($id);
        // dd($pendaftaranMagang);
        return view('penelitian.detail', compact('pendaftaranMagang'));
    }

    public function terima(PendaftaranPenelitian $pendaftaranMagang)
    {
        Mail::to($pendaftaranMagang->mahasiswa->email)->send(new kirimEmail($pendaftaranMagang));
        $balai = $pendaftaranMagang->magang->balai;

        // Check if there's available quota before accepting the registration
        if ($balai->kuota > 0) {
            // Decrease the quota by 1
            $balai->decrement('kuota');
            $pendaftaranMagang->update([
                'status_pendaftaran' => 'Diterima',
            ]);
            return redirect()->route('penelitian.index')->with('success', 'Pendaftaran Diterima');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Kuota sudah habis.');
        }
    }

    public function tolak(PendaftaranPenelitian $pendaftaranMagang)
    {
        $pendaftaranMagang->update([
            'status_pendaftaran' => 'Ditolak',
        ]);

        return redirect()->route('penelitian.index')->with('success', 'Pendaftaran Ditolak');
    }
    
    public function selesai(PendaftaranPenelitian $pendaftaranMagang)
{
    $balai = $pendaftaranMagang->magang->balai;

        // Check if there's available quota before accepting the registration
        if ($balai->kuota > 0) {
            // Decrease the quota by 1
            $balai->increment('kuota');
            $pendaftaranMagang->update([
                'status_pendaftaran' => 'Selesai',
            ]);
            return redirect()->route('magang.index')->with('success', 'Magang Telah Selesai');
        } else {
            return redirect()->route('magang.index')->with('error', 'Kuota sudah habis.');
        }
}


public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'magang_id' => 'required',
        'nim' => 'required|numeric',
        'nama' => 'required|string',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'no_telepon' => 'required|numeric',
        'email' => 'required|email',
        'instansi' => 'required|string',
        'program_studi' => 'required|string',
        'semester' => 'required|numeric',
        'file_kesbangpol' => 'required|file|mimes:pdf',
        'file_penelitian' => 'required|file|mimes:pdf',
    ]);

    // Create a new Mahasiswa record
    $mahasiswa = Mahasiswa::create([
        'nim' => $request->input('nim'),
        'nama' => $request->input('nama'),
        'jenis_kelamin' => $request->input('jenis_kelamin'),
        'alamat' => $request->input('alamat'),
        'no_telepon' => $request->input('no_telepon'),
        'email' => $request->input('email'),
        'instansi' => $request->input('instansi'),
        'program_studi' => $request->input('program_studi'),
        'semester' => $request->input('semester'),
    ]);

    if ($mahasiswa) {
        // Store the uploaded files in the public/files directory
       $fileKesbangpol = $request->file('file_kesbangpol');
        $filePenelitian = $request->file('file_penelitian');

        // Define the storage path within the storage/app/public directory
        $storagePath = 'public/files/';

        // Create unique filenames
        $filename = date('Y-m-d') . $fileKesbangpol->getClientOriginalName();
        $filename1 = date('Y-m-d') . $filePenelitian->getClientOriginalName();

        // Store the files in the specified storage path
        $fileKesbangpol->storeAs($storagePath, $filename);
        $filePenelitian->storeAs($storagePath, $filename1);
        // Create a new PendaftaranMagang record
        PendaftaranPenelitian::create([
            'mahasiswa_id' => $mahasiswa->id,
            'magang_id' => $request->input('magang_id'),
            'tanggal_pendaftaran' => now(),
            'status_pendaftaran' => 'Pending',
            'file_kesbangpol' => $filename,
            'file_penelitian' => $filename1,
        ]);
    
        // Redirect to a success page or perform other actions
        return redirect()->route('welcome')->with('success', 'Pendaftaran Penelitian Berhasil, Tunggu Pemberitahuan Lebih Lanjut');
    } else {
        // Handle insertion failure
        return redirect()->route('welcom')->with('error', 'Pendaftaran Penelitian Gagal. Silakan coba lagi.');
    }
}
}



