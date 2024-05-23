<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Ibu;
use App\Models\PenimbanganAnak;

use Illuminate\Http\Request;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardanak.index', [
            'anaks' => Anak::with('ibu')->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $melahirkan = ['normal', 'sesar'];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('adminpage.dashboardanak.create', [
            'ibus' => Ibu::all(),
            'melahirkan' => $melahirkan,
            'jenis_kelamin' => $jenis_kelamin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'kode' => 'required|min:4|unique:anaks',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'berat_lahir' => 'required',
            'tinggi_lahir' => 'required|numeric',
            'proses_melahirkan' => 'required',
            'alamat' => 'required|max:255',
            'ibu_id' => 'required'
        ]);

        $ibu = Ibu::where('id', $validated['ibu_id'])->first();

        $validated['nama_ibu'] = $ibu->nama;

        Anak::create($validated);

        return redirect('dashboard/anak')->with('success', 'Data anak berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anak $anak)
    {

        $melahirkan = ['normal', 'sesar'];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('adminpage.dashboardanak.edit', [
            'anak' => $anak,
            'ibus' => Ibu::all(),
            'melahirkan' => $melahirkan,
            'jenis_kelamin' => $jenis_kelamin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anak $anak)
    {
        $rules = [
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'berat_lahir' => 'required',
            'tinggi_lahir' => 'required|numeric',
            'proses_melahirkan' => 'required',
            'alamat' => 'required|max:255',
            'ibu_id' => 'required'
        ];

        // cek apakah kode dirubah : 
        if ($request->kode != $anak->kode) {
            $rules['kode'] = 'required|min:4|unique:anaks';
        }

        $validated = $request->validate($rules);

        if ($request->ibu_id != $anak->ibu_id) {
            $getDataIbu = Ibu::where('id', $request->ibu_id)->first();
            $validated['nama_ibu'] = $getDataIbu->nama;
        }

        Anak::where('id', $anak->id)
            ->update($validated);

        return redirect('dashboard/anak')->with('success', 'Data anak berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anak $anak)
    {
        Anak::destroy($anak->id);

        return redirect('dashboard/anak')->with('success', 'Data anak berhasil dihapus!');
    }

    public function cekanak()
    {

        return view('userpage.dataanak', [
            'anaks' => Anak::latest()->get()
        ]);
    }

    public function cekberat(Anak $data)
    {

        $tahunSekarang = date('Y');

        for ($i = 1; $i <= 12; $i++) {
            $getData = PenimbanganAnak::select('berat_badan', 'tinggi_badan')->where('kode_anak', $data->kode)
                ->whereMonth('tanggal', $i)->whereYear('tanggal', $tahunSekarang)
                ->first();

            if ($getData == null) {
                $dataBerat[] = 0;
                $dataTinggi[] = 0;
            } else {
                $dataBerat[] = $getData['berat_badan'];
                $dataTinggi[] = $getData['tinggi_badan'];
            }
        }

        return view('userpage.grafik', [
            'dataBerat' => $dataBerat,
            'dataTinggi' => $dataTinggi,
            'label' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        ]);
    }

    public function cetak(Request $request)
    {
        $data = Anak::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        return view('adminpage.dashboardanak.cetak', [
            'dataAnaks' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
