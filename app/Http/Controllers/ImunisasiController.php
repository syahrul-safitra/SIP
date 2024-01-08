<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Anak;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardimunisasi.index', [
            'imunisasis' => Imunisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $jenis_imunisasis = ['Hepatitis B', 'Polio', 'BCG', 'DPT', 'Hib', 'Campak', 'MMR', 'PCV', 'Rotavirus', 'Influenza', 'Tipes', 'Hepatitis A', 'Varisela', 'HPV', 'Japanese encephalitis', 'Dengue', 'COVID-19'];

        return view('adminpage.dashboardimunisasi.create', [
            'anaks' => Anak::all(),
            'jenis_imunisasis' => $jenis_imunisasis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'jenis_imunisasi' => 'required',
            'catatan' => 'max:1000',
            'kode_anak' => 'required',
            'tanggal' => 'required'
        ]);

        $getDataAnak = Anak::where('kode', $validated['kode_anak'])->first();

        $validated['nama_anak'] = $getDataAnak->nama;

        Imunisasi::create($validated);

        return redirect('dashboard/imunisasi')->with('success', 'Data imunisasi berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Imunisasi $imunisasi)
    {
        return view('adminpage.dashboardimunisasi.show', [
            'imunisasi' => $imunisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imunisasi $imunisasi)
    {

        $jenis_imunisasis = ['Hepatitis B', 'Polio', 'BCG', 'DPT', 'Hib', 'Campak', 'MMR', 'PCV', 'Rotavirus', 'Influenza', 'Tipes', 'Hepatitis A', 'Varisela', 'HPV', 'Japanese encephalitis', 'Dengue', 'COVID-19'];

        return view('adminpage.dashboardimunisasi.edit', [
            'imunisasi' => $imunisasi,
            'anaks' => Anak::all(),
            'jenis_imunisasis' => $jenis_imunisasis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imunisasi $imunisasi)
    {

        $validated = $request->validate([
            'jenis_imunisasi' => 'required',
            'catatan' => 'max:1000',
            'kode_anak' => 'required',
            'tanggal' => 'required'
        ]);

        if ($request->kode_anak != $imunisasi->kode_anak) {
            $getDataAnak = Anak::where('kode', $request->kode_anak)->first();
            $validated['nama_anak'] = $getDataAnak->nama;
        }

        Imunisasi::where('id', $imunisasi->id)
            ->update($validated);

        return redirect('dashboard/imunisasi')->with('success', 'Data imunisasi berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imunisasi $imunisasi)
    {
        Imunisasi::destroy($imunisasi->id);

        return redirect('dashboard/imunisasi')->with('success', 'Data imunisasi berhasil dihapus!');
    }
}
