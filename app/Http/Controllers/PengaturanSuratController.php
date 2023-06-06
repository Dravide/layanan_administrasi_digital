<?php

namespace App\Http\Controllers;

use App\Models\PengaturanSurat;
use Illuminate\Http\Request;


class PengaturanSuratController extends Controller
{
    public function header()
    {
        $data = PengaturanSurat::where('jenis', 'header')->first();
        return view('pengaturansurat.headersurat')->with('data', $data);

    }

    public function headerstore(Request $request)
    {
        $request->validate([
            'isi' => 'required',
        ]);

        PengaturanSurat::updateorCreate(
            ['id' => 1],
            ['isi' => $request->isi, 'jenis' => 'header']
        );
        return redirect()->route('header')->with('success', 'Header Surat Berhasil Diubah');

    }

    public function footer()
    {
        $data = PengaturanSurat::where('jenis', 'footer')->first();

        return view('pengaturansurat.footersurat')->with('data', $data);
    }

    public function footerstore(Request $request)
    {
        $request->validate([
            'isi' => 'required',
        ]);

        PengaturanSurat::updateorCreate(
            ['id' => 2],
            ['isi' => $request->isi, 'jenis' => 'footer']
        );
        return redirect()->route('footer')->with('success', 'Header Surat Berhasil Diubah');

    }

}
