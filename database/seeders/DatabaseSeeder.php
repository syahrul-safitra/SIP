<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'King',
            'email' => 'adminposyandu@gmail.com',
            'password' => 'adminposyandu123',
        ]);

        \App\Models\Ibu::create([
            'nik' => '10101010',
            'nama' => 'Ayu',
            'suami' => 'King',
            'tempat_lahir' => 'Muaro Jambi',
            'tanggal_lahir' => '2020-10-10',
            'alamat' => 'Bungo',
            'no_hp' => '0100101',
        ]);

        \App\Models\Ibu::create([
            'nik' => '20202020',
            'nama' => 'Devi',
            'suami' => 'King',
            'tempat_lahir' => 'Muaro Jambi',
            'tanggal_lahir' => '2020-10-10',
            'alamat' => 'Bungo',
            'no_hp' => '0100101',
        ]);

        \App\Models\Ibu::create([
            'nik' => '3030303030',
            'nama' => 'Eli',
            'suami' => 'King',
            'tempat_lahir' => 'Muaro Jambi',
            'tanggal_lahir' => '2020-10-10',
            'alamat' => 'Bungo',
            'no_hp' => '0100101',
        ]);

        \App\Models\Anak::create([
            'kode' => '1010',
            'nama' => 'Kaido',
            'tempat_lahir' => 'Muaro Jambi',
            'tanggal_lahir' => '2020-10-10',
            'jenis_kelamin' => 'laki-laki',
            'berat_lahir' => '1,5',
            'tinggi_lahir' => '50',
            'proses_melahirkan' => 'normal',
            'alamat' => 'Jl. Muaro',
            'nama_ibu' => 'Ayu',
            'ibu_id' => '1'
        ]);

        \App\Models\Imunisasi::create([
            'jenis_imunisasi' => 'Hepatitis B',
            'kode_anak' => '1010',
            'tanggal' => '2020-10-10',
            'catatan' => 'normal',
            'nama_anak' => 'Kaido'
        ]);

        \App\Models\PeriksaIbuHamil::create([
            'nik_ibu' => '10101010',
            'berat_badan' => '60,5',
            'umur_kehamilan' => '3,5',
            'tindakan' => 'pemberian vitamin',
            'catatan' => 'istirahat yang cukup',
            'tanggal' => '2020-10-10'
        ]);

        \App\Models\PenimbanganAnak::create([
            'kode_anak' => '1010',
            'nama' => 'Kaido',
            'berat_badan' => '6.5',
            'tinggi_badan' => '56',
            'catatan' => 'Sehat Wal afiat',
            'tanggal' => '2020-10-10'
        ]);
    }
}
