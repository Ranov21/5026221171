<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller

public function index()
{
    $karyawan = Karyawan::all();
    return view('karyawan.index', compact('karyawan'));
}

public function create()
{
    return view('karyawan.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'kodepegawai' => 'required|size:5',
        'namalengkap' => 'required|max:50',
        'divisi' => 'required|size:5',
    ]);

    Karyawan::create($validated);

    return redirect()->route('karyawan.index');
}

public function destroy($kodepegawai)
{
    Karyawan::where('kodepegawai', $kodepegawai)->delete();
    return redirect()->route('karyawan.index');
}
