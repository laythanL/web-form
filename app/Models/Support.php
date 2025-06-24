<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class, 'assigned_to');
    }

}
