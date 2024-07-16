<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $requestData = $request->validate([
            'no_pasien' => 'required',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:5000',
        ]);

        $pasien = new \App\Models\Pasien(); //membuat objek kosong di variabel model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $pasien->foto = $request->file('foto')->store('public'); //mengisi foto dengan pathFoto
        $pasien->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
