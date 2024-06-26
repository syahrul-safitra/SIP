<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'berat_lahir',
        'tinggi_lahir',
        'proses_melahirkan',
        'alamat',
        'nama_ibu',
        'ibu_id',
    ];

    public function ibu()
    {
        return $this->belongsTo(Ibu::class);
    }

    public function penimbangan()
    {
        return $this->hasMany(PenimbanganAnak::class, 'kode_anak', 'kode');
    }
}
