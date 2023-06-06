<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasisController extends Controller
{
    public function index()
    {
        $data = Klasifikasi::all();
        return view('klasifikasi.index')->with(compact('data'));
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'uraian' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:klasifikasis',
            'keterangan' => 'required|string|max:255',
        ], [
            'uraian.required' => 'Uraian tidak boleh kosong!',
            'kode.required' => 'Kode tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',

        ]);

        Klasifikasi::create($credentials);

        return redirect()->route('klasifikasi.index')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function create()
    {
    }

    public function show(Klasifikasi $klasifikasi)
    {
    }

    public function edit(Klasifikasi $klasifikasi)
    {
    }

    public function update(Request $request, Klasifikasi $klasifikasi)
    {
    }

    public function destroy(Klasifikasi $klasifikasi)
    {
        Klasifikasi::destroy($klasifikasi->id);
        return redirect()->route('klasifikasi.index')->with('sukses', 'Data berhasil dihapus!');
    }
}
