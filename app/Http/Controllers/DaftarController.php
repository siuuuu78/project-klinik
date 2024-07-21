<?php

namespace App\Http\Controllers;


use App\Models\Poli;
use App\Models\Daftar;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['daftar'] = Daftar::latest()->paginate(10);
        return view('daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('nama', 'asc')->get();
        return view('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'id_pasien' => 'required',
            'poli_id' => 'required',
            'keluhan' => 'required',
        ]);

        
        $daftar = new \App\Models\Daftar(); //membuat objek kosong di variabel model
        $daftar->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $daftar->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['daftar'] = \App\Models\Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $daftar = Daftar::findOrFail($id);
        $listPasien = Pasien::all(); // Mengambil semua data pasien
        $listPoli = Poli::all(); // Mengambil semua data poli
        return view('daftar_edit', compact('daftar', 'listPasien', 'listPoli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'tindakan' => 'required|string',
            'diagnosis' => 'required|string',
        ]);
    
        $daftar = \App\Models\Daftar::findOrFail($id);
        
        $daftar->fill($requestData);
        $daftar->save();
    
        flash('Data Berhasil Diupdate')->success();
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $daftar =  \App\Models\Daftar::findOrFail($id);

    $daftar->delete();
     flash('Data sudah dihapus')->success();
     return back();
    }

}