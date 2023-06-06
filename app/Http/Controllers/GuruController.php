<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $datas = json_decode(Storage::get('public/dataguru.json'), true);
        return view('guru.index', compact('datas'));
    }
}
