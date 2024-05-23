<?php

namespace App\Http\Controllers;

use App\Models\PenimbanganAnak;
use App\Models\Anak;

use Illuminate\Http\Request;

class PenimbanganAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pagePanginate = 5;
        return view('adminpage.dashboardpenimbangananak.index', [
            'penimbanganAnak' => PenimbanganAnak::latest()->paginate($pagePanginate),
            'pagePaginate' => $pagePanginate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.dashboardpenimbangananak.create', [
            'anaks' => Anak::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anak' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'catatan' => 'required',
            'tanggal' => 'required'
        ]);

        $getData = Anak::where('kode', $validated['kode_anak'])->first();

        $validated['nama'] = $getData->nama;

        PenimbanganAnak::create($validated);

        return redirect('dashboard/penimbangananak')->with('success', 'Data penimbangan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenimbanganAnak $penimbangananak)
    {
        return view('adminpage.dashboardpenimbangananak.show', [
            'penimbanganAnak' => $penimbangananak
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenimbanganAnak $penimbangananak)
    {
        return view(
            'adminpage.dashboardpenimbangananak.edit',
            [
                'anaks' => Anak::all(),
                'penimbanganAnak' => $penimbangananak
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenimbanganAnak $penimbangananak)
    {
        $validated = $request->validate([
            'kode_anak' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'catatan' => 'required',
            'tanggal' => 'required'
        ]);

        $getDataAnak = Anak::where('kode', $validated['kode_anak'])->first();
        $validated['nama'] = $getDataAnak->nama;

        PenimbanganAnak::where('id', $penimbangananak->id)
            ->update($validated);

        return redirect('dashboard/penimbangananak')->with('success', 'Data penimbangan berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenimbanganAnak $penimbangananak)
    {
        PenimbanganAnak::destroy($penimbangananak->id);

        return back()->with('success', 'Data penimbangan anak berhasil dihapus!');
    }

    public function cetak(Request $request)
    {
        $data = PenimbanganAnak::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        return view('adminpage.dashboardpenimbangananak.cetak', [
            'dataPenimbangan' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
