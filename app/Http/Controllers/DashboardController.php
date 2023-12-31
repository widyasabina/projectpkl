<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PendaftaranMagang;
use App\Models\PendaftaranPenelitian;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah Postingan
        $jumlahPostingan = DB::table('magang')->count();

        // Jumlah Unit Kerja
        $jumlahUnitKerja = DB::table('balai')->count();

        // Jumlah User Baru (for the previous day)
        $yesterday = Carbon::yesterday()->toDateString();
        $jumlahUserBaru = DB::table('users')->whereDate('created_at', $yesterday)->count();
        $jumlahUser = DB::table('users')->count();

        // Total Magang
        $totalMagang = DB::table('pendaftaran_magang')->count();

        // Total Peneliti
        $totalPeneliti = DB::table('pendaftaran_penelitian')->count();

        $pendingMagang = PendaftaranMagang::where('status_pendaftaran', 'Pending')->count();

        // Fetch pending research applicants
        $pendingPenelitian = PendaftaranPenelitian::where('status_pendaftaran', 'Pending')->count();


        return view('dashboard.index', [
            'jumlahPostingan' => $jumlahPostingan,
            'jumlahUnitKerja' => $jumlahUnitKerja,
            'jumlahUserBaru' => $jumlahUserBaru,
            'jumlahUser' => $jumlahUser,
            'totalMagang' => $totalMagang,
            'totalPeneliti' => $totalPeneliti,
            'pendingMagang' => $pendingMagang,
            'pendingPenelitian' => $pendingPenelitian,
        ]);
    }
}
