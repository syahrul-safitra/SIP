<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use Illuminate\Http\Request;

class IbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardibu.index', [
            'ibus' => Ibu::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.dashboardibu.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nik' => 'required|max:17|unique:ibus',
            'nama' => 'required|max:255',
            'suami' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:20'
        ]);

        Ibu::create($validated);

        // redirect : with() => session yg digunakan untuk menyimpan pesan berhasil yg kemudian dipanggil di dalam dashboard/instansi : 
        return redirect('dashboard/ibu')->with('success', 'Data ibu berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ibu $ibu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ibu $ibu)
    {
        return view('adminpage.dashboardibu.edit', [
            'ibu' => $ibu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ibu $ibu)
    {
        $rules = [
            'nama' => 'required|max:255',
            'suami' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:20'
        ];

        // cek apakah nik diubah : 
        if ($request->nik != $ibu->nik) {
            $rules['nik'] = 'required|max:17|unique:ibus';
        };

        $validated = $request->validate($rules);

        Ibu::where('id', $ibu->id)
            ->update($validated);

        return redirect('dashboard/ibu')->with('success', 'Data ibu berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibu $ibu)
    {
        Ibu::destroy($ibu->id);

        return redirect('dashboard/ibu')->with('success', 'Data ibu berhasil dihapus!');
    }

    public function cetak(Request $request)
    {
        return view('adminpage.dashboardibu.cetak', [
            'dataIbus' => Ibu::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
