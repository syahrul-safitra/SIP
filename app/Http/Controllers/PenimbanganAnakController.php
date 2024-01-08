<?php

namespace App\Http\Controllers;

use App\Models\PenimbanganAnak;
use Illuminate\Http\Request;

class PenimbanganAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpage.dashboardpenimbangananak.index', [
            'penimbanganAnak' => PenimbanganAnak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PenimbanganAnak $penimbanganAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenimbanganAnak $penimbanganAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenimbanganAnak $penimbanganAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenimbanganAnak $penimbanganAnak)
    {
        //
    }
}
