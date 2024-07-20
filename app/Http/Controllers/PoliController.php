<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;
use Illuminate\Support\Facades\Storage;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = Poli::latest()->paginate(5);
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */

     
    public function store(StorePoliRequest $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
            'keterangan' => 'nullable',
        ]);

        $poli = new \App\Models\Poli(); //membuat objek kosong di variabel model
        $poli->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
        $poli->save();
        flash('Data Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
            'keterangan' => 'nullable',
        ]);
    
        $poli = \App\Models\Poli::findOrFail($id);
        $poli->fill($requestData);
        $poli->save();
    
        flash('Data Berhasil Diupdate')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli =  \App\Models\Poli::findOrFail($id);
      
        if ($poli->daftar()->count() >= 1){
            flash('Opss.. Data Tidak Dapat Dihapus Karena Terkait Dengan Pendaftaran!')->error();
            return back();
           }

        $poli->delete();
         flash('Data sudah dihapus')->success();
         return back();
     }

}
