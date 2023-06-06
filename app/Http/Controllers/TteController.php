<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TteController extends Controller
{
    public function index($url)
    {
        $surat = Surat::where('url', $url)->first();
        if (is_null($surat)) {
            abort(404);
        } else {
            if ($surat->validasi == 'Tidak' or $surat->validasi == null) {
                return view('tte.index', compact('surat'));
            } else {
                return view('tte.validated', compact('surat',));
            }
        }


    }

    public function store(Request $request)
    {
        $data = Surat::find($request->id);

        $data->update([
            'sig' => Crypt::encryptString($request->sig),
            'validasi' => 'Ya',
            'validated_at' => now('Asia/Jakarta'),
        ]);
        $data->save();

        return redirect()->route('tte.index', $data->url);
    }
}
