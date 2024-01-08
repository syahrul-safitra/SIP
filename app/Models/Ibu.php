<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'suami',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp'
    ];

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function periksaIbuHamil()
    {
        return $this->hasMany(PeriksaIbuHamil::class, 'nik_ibu', 'nik');
    }
}
