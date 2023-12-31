<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use App\Models\Magang;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index(){
        $magang = Magang::with('balai')->get();

        return view ('postingan.index', compact('magang'));
    }

    public function create()
    {
        // Mengambil data Balai untuk menampilkan dalam pilihan Unit Kerja
        $magang = Balai::get();

        return view('postingan.create', compact('magang'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'balai_id' => 'required|exists:balai,id',
            'deskripsi' => 'required|in:Magang,Penelitian',
            'deadline_pendaftaran' => 'required|date',
        ]);

        // Simpan postingan ke database
        $postingan = new Magang([
            'id_balai' => $request->input('balai_id'),
            'deskripsi' => $request->input('deskripsi'),
            'deadline_pendaftaran' => $request->input('deadline_pendaftaran'),
        ]);
        $postingan->save();

        // Redirect ke halaman yang sesuai
        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil dibuat');
    }

    public function edit($id)
    {
        $postingan = Magang::findOrFail($id);
        $magang = Magang::with('balai')->get();

        return view('postingan.edit', compact('postingan', 'magang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'balai_id' => 'required',
            'deskripsi' => 'required',
            'deadline_pendaftaran' => 'required|date',
        ]);

        $postingan = Magang::findOrFail($id);
        $postingan->update([
            'id_balai' => $request->balai_id,
            'deskripsi' => $request->deskripsi,
            'deadline_pendaftaran' => $request->deadline_pendaftaran,
        ]);

        return redirect()->route('postingan.index')->with('success', 'Postingan Magang/Penelitian berhasil diperbarui.');
    }

    public function destroy($id)
{
    $postingan = Magang::findOrFail($id);
    $postingan->delete();

    return redirect()->route('postingan.index')->with('success', 'Postingan Magang/Penelitian berhasil dihapus.');
}
}
