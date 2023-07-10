<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'universitas_id',
        'nama',
        'nim',
        'no_telpon',
        'umur',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'image',
    ];

    public function universitas()
    {
        return $this->belongsTo(universitas::class);
    }
}
