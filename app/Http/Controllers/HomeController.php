<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\Balai;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $magang = Magang::select('id_balai')->with('balai')->distinct()->get();
        // dd($magang);
        return view('welcome', compact('magang'));
    }

    public function magang($id_balai)
    {
        $magangId = Magang::where('deskripsi', 'Magang')
        ->where('id_balai', $id_balai)
        ->pluck('id')
        ->first();

    // Pastikan $magangId tidak null sebelum digunakan

    $magang = Magang::with('balai')->find($magangId);

    return view('daftar.magang', compact('magang'));
    }
    public function penelitian($id_balai)
    {
        $magangId = Magang::where('deskripsi', 'Penelitian')
        ->where('id_balai', $id_balai)
        ->pluck('id')
        ->first();

    // Pastikan $magangId tidak null sebelum digunakan

    $magang = Magang::with('balai')->find($magangId);

    return view('daftar.penelitian', compact('magang'));
    }
}
