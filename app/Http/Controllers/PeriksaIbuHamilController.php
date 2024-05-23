<?php

namespace App\Http\Controllers;

use App\Models\PeriksaIbuHamil;
use App\Models\Ibu;
use Illuminate\Http\Request;

class PeriksaIbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('adminpage.dashboardperiksaibuhamil.index', [
            'periksa_ibu' => PeriksaIbuHamil::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.dashboardperiksaibuhamil.create', [
            'ibus' => Ibu::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nik_ibu' => 'required',
            'berat_badan' => 'required',
            'umur_kehamilan' => 'required',
            'tindakan' => 'required',
            'catatan' => 'required',
            'tanggal' => 'required'
        ]);

        PeriksaIbuHamil::create($validated);

        return redirect('dashboard/periksaibuhamil')->with('success', 'Data periksa ibu hamil berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriksaIbuHamil $periksaibuhamil)
    {
        return view('adminpage.dashboardperiksaibuhamil.show', [
            'periksa' => $periksaibuhamil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriksaIbuHamil $periksaibuhamil)
    {

        return view('adminpage.dashboardperiksaibuhamil.edit', [
            'ibus' => Ibu::all(),
            'periksa' => $periksaibuhamil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriksaIbuHamil $periksaibuhamil)
    {
        $validated = $request->validate([
            'nik_ibu' => 'required',
            'berat_badan' => 'required',
            'umur_kehamilan' => 'required',
            'tindakan' => 'required',
            'catatan' => 'required',
            'tanggal' => 'required'
        ]);

        PeriksaIbuHamil::where('id', $periksaibuhamil->id)
            ->update($validated);

        return redirect('dashboard/periksaibuhamil')->with('success', 'Data periksa ibu hamil berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriksaIbuHamil $periksaibuhamil)
    {
        PeriksaIbuHamil::destroy($periksaibuhamil->id);

        return redirect('dashboard/periksaibuhamil')->with('success', 'Data periksa ibu hamil berhasil dihapus!');
    }

    public function cetak(Request $request)
    {
        $data = PeriksaIbuHamil::with('ibu')->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        return view('adminpage.dashboardperiksaibuhamil.cetak', [
            'dataPeriksaIbu' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
