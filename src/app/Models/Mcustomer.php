<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mcustomer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Mcustomer';

    protected $fillable = [
        'kode',
        'nama',
        'jenis_usaha',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'kota',
        'telepon',
        'fax',
        'kontak',
        'email',
        'npwp',
        'top_kredit',
        'purchasing_nama',
        'purchasing_email',
        'purchasing_extensi_hp',
        'data_pajak_nama',
        'data_pajak_npwp',
        'data_pajak_alamat',
        'data_pajak_alamat2',
        'pemilik_nama',
        'pemilik_no_ktp_sim',
        'pemilik_tempat_lahir',
        'pemilik_tgl_lahir',
        'pemilik_alamat_rumah',
        'pemilik_desa',
        'pemilik_kecamatan',
        'pemilik_kabupaten',
        'pemilik_telepon',
        'pemilik_fax',
        'pemilik_email',
        'pemilik_npwp',
        'pemilik_agama',
        'kontak_lain_nama',
        'kontak_lain_telepon',
        'accounting_nama',
        'accounting_email',
        'accounting_extensi_hp',
    ];

    protected $casts = [
        'pemilik_tgl_lahir' => 'date',
    ];
}
