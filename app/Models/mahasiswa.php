<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nim',
        'no_telpon',
        'umur',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'image',
    ];

    protected $table = 'mahasiswa';
}
