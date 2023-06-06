<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanSurat extends Model
{
    protected $fillable = [
        'jenis',
        'isi'
    ];
}
