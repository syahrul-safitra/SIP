<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriksaIbuHamil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_ibu',
        'berat_badan',
        'umur_kehamilan',
        'tindakan',
        'catatan',
        'tanggal'
    ];

    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'nik_ibu', 'nik');
    }
}
