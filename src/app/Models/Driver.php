<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'phone',
        'mulai_kerja'
    ];

    protected $casts = [
        'mulai_kerja' => 'date'
    ];
}
