<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:5000',
        ]);

        $pasien = new \App\Models\Pasien(); //membuat objek kosong di variabel model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $pasien->foto = $request->file('foto')->store('potos'); //mengisi foto dengan pathFoto
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
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'alamat' => 'nullable',
        ]);
    
        $pasien = \App\Models\Pasien::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            Storage::delete($pasien->foto);
            $pasien->foto = $request->file('foto')->store('public');
        }
    
        $pasien->fill($requestData);
        $pasien->save();
    
        flash('Data Berhasil Diupdate')->success();
        return back();
    }
    

  
    public function destroy(string $id)
    {
       $pasien =  \App\Models\Pasien::findOrFail($id);

       if ($pasien->daftar->count() >= 1){
        flash('Opss.. Data Tidak Dapat Dihapus Karena Terkait Dengan Pendaftaran!')->error();
        return back();
       }

       if ($pasien->foto !=null && Storage::exists($pasien->foto)){
                Storage::delete($pasien->foto);
       }
       $pasien->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
