<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $datasiswa = json_decode(Storage::get('public/data.json'), true);
        $updated_at = Carbon::parse($datasiswa['updated_at'])->diffForHumans();
        return view('siswa.index')->with(compact('updated_at'));
    }
}
