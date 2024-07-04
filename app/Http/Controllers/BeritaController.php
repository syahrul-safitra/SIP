<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardberita.index', [
            'beritas' => Berita::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.dashboardberita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|unique:beritas',
            'foto' => 'required|image|max:5000',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]);

        // $validated['foto'] = $request->file('foto')->store('foto');
        // get file : 
        $file = $request->file('foto');

        $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

        $validated['foto'] = $renameNamaFile;

        $tujuan_upload = 'file';

        $file->move($tujuan_upload, $renameNamaFile);


        Berita::create($validated);

        return redirect('dashboard/berita')->with('success', 'Data Berita Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        return view('adminpage.dashboardberita.edit', [
            'berita' => $beritum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $rules = [
            'foto' => 'image|max:5000',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ];

        // jika judul diubah : 
        if ($request->judul != $beritum->judul) {
            $rules['judul'] = 'required|unique:beritas';
        }

        // validasi dulu : 
        $validated = $request->validate($rules);

        if ($request->file('foto')) {

            // hapus foto lama 
            // Storage::delete($beritum->foto);

            // store foto baru dan datanya disimpan dalam validated[foto]:
            // $validated['foto'] = $request->file('foto')->store('foto');

            // get file : 
            $file = $request->file('foto');

            $renameNamaFile = uniqid() . '_' . $file->getClientOriginalName();

            $validated['foto'] = $renameNamaFile;

            $tujuan_upload = 'file';

            $file->move($tujuan_upload, $renameNamaFile);

            File::delete('file/' . $beritum->file);
        }

        Berita::where('id', $beritum->id)->update($validated);

        return redirect('dashboard/berita')->with('success', 'Data Berita Berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        // hapus foto : 
        // Storage::delete($beritum->foto);

        // hapus data file terlebih dahulu : 
        File::delete('file/' . $beritum->file);


        // hapus berita : 
        Berita::destroy($beritum->id);

        return redirect("dashboard/berita")->with('success', 'Data Berita Berhasil dihapus!');
    }

    public function bacaberita(Berita $berita)
    {
        return view('userpage.bacaberita', [
            'berita' => $berita
        ]);
    }
}
