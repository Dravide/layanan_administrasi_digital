<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klasifikasi extends Model
{
    protected $fillable = [
        'kode',
        'uraian',
        'keterangan',
    ];

    public function template(): HasMany
    {
        return $this->hasMany(Template::class);
    }
}
