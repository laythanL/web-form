<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'nama_device',
        'device_code',
        'type',
        'location',
        'status',
        'assigned_to',
    ];
    public function support()
    {
        return $this->belongsTo(Support::class, 'assigned_to');
    }

}
