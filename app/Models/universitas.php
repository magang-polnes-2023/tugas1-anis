<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'no_telpon',
        'email',
        'akreditasi',
    ];
    protected $table = 'universitas';
}
