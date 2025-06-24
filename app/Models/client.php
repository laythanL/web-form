<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'no_telepon',
        'email',
        'alamat'
    ];
}
