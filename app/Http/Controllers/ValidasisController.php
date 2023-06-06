<?php

namespace App\Http\Controllers;

use App\Models\Surat;

class ValidasisController extends Controller
{
    public function __invoke($url)
    {
        $surat = Surat::join('templates', 'surats.templates_id', '=', 'templates.id')
            ->where('url', $url)->first();
        return view('validasi.index', compact('surat'));
    }
}
