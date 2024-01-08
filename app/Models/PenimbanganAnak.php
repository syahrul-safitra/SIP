<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenimbanganAnak extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_anak',
        'berat_badan',
        'tinggi_badan',
        'catatan',
        'nama',
        'tanggal'
    ];
}
