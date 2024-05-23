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
            'imunisasis' => Imunisasi::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $jenis_imunisasis = [
            'BC 6 POLI I',
            'DPT 1 POLI II',
            'DPT 2 POLI III',
            'DPT 3 POLI VI',
            'DPT 4',
            'CMPK 1',
            'CMPK 2',
            'IPP',
            'PCV 1',
            'PCV 2',
            'VIT A'
        ];


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

        $jenis_imunisasis = [
            'BC 6 POLI I',
            'DPT 1 POLI II',
            'DPT 2 POLI III',
            'DPT 3 POLI VI',
            'DPT 4',
            'CMPK 1',
            'CMPK 2',
            'IPP',
            'PCV 1',
            'PCV 2',
            'VIT A'
        ];

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

    public function cekimunisasi()
    {

        $data = Imunisasi::whereYear('tanggal', date('Y'))->latest()->paginate(20);

        if (request('search')) {
            $data = Imunisasi::whereYear('tanggal', date('Y'))
                ->where('nama_anak', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_imunisasi', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal', 'like', '%' . request('search') . '%')
                ->paginate(20);
        }

        return view('adminpage.dashboardimunisasi.cekimunisasi', [
            'imunisasis' => $data
        ]);
    }

    public function cetak(Request $request)
    {

        $data = Imunisasi::with('anak')->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        return view('adminpage.dashboardimunisasi.cetak', [
            'dataImunisasis' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
