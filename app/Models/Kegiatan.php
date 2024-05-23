<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telpon',
        'foto'
    ];
}
