<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardanggota.index', [
            'anggotas' => Anggota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.dashboardanggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|numeric|unique:anggotas',
            'nama' => 'required|max:100',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:100',
            'no_telpon' => 'required|max:15',
            'foto' => 'required|image|file|max:5000'
        ]);

        $validated['foto'] = $request->file('foto')->store('foto');

        Anggota::create($validated);

        return redirect('dashboard/anggota')->with('success', 'Data Anggota Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotum)
    {
        return view('adminpage.dashboardanggota.edit', [
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggotum)
    {
        $rules = [
            'nama' => 'required|max:100',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:100',
            'no_telpon' => 'required|max:15',
            'foto' => 'image|file|max:5000',
        ];

        // cek jika kode berubah : 
        if ($request->kode != $anggotum->kode) {
            $rules['kode'] = 'required|numeric|unique:anggotas';
        }

        $validated = $request->validate($rules);

        // cek jika foto diganti : 
        if ($request->file('foto')) {

            // jika ada foto lama hapus: 
            if ($anggotum->foto) {
                Storage::delete($anggotum->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        Anggota::where('id', $anggotum->id)->update($validated);

        return redirect('dashboard/anggota')->with('success', 'Data Anggota Berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotum)
    {

        if ($anggotum->foto) {
            Storage::delete($anggotum->foto);
        }

        Anggota::destroy($anggotum->id);

        return redirect('dashboard/anggota')->with('success', 'Data anggota berhasil dihapus!');
    }
}
