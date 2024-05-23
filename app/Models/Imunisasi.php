<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_imunisasi', 'catatan', 'tanggal', 'nama_anak', 'kode_anak'];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'kode_anak', 'kode');
    }
}
