<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use Illuminate\Http\Request;

class BalaiController extends Controller
{
    public function index()
    {
        $balais = Balai::all();
        return view('balai.index', compact('balais'));
    }

    public function create()
    {
        return view('balai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_kerja' => 'required',
            'kuota' => 'required|numeric',
            'deskripsi' => 'required',
            'icon' => 'required', // sesuaikan validasi file
        ]);


        Balai::create([
            'unit_kerja' => $request->input('unit_kerja'),
            'kuota' => $request->input('kuota'),
            'deskripsi' => $request->input('deskripsi'),
            'icon' => $request->input('icon'),
        ]);

        return redirect()->route('balai.index')->with('success', 'Balai created successfully.');
    }

    public function edit($id)
    {
        $balai = Balai::find($id);
        return view('balai.edit', compact('balai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_kerja' => 'required',
            'kuota' => 'required|numeric',
            'deskripsi' => 'required',
            'icon' => 'required', // sesuaikan validasi file
        ]);

        $balai = Balai::find($id);

       
        $balai->unit_kerja = $request->input('unit_kerja');
        $balai->kuota = $request->input('kuota');
        $balai->deskripsi = $request->input('deskripsi');
        $balai->icon = $request->input('icon');
        $balai->save();

        return redirect()->route('balai.index')->with('success', 'Balai updated successfully.');
    }

    public function destroy($id)
    {
        $balai = Balai::find($id);
        $balai->delete();
        return redirect()->route('balai.index')->with('success', 'Balai deleted successfully.');
    }
}
