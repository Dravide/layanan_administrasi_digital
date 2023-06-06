<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['titimangsa', 'validated_at'];


}
