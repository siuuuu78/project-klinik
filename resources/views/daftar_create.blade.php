@extends('layouts.app_modern', ['title' => 'Pendaftaran Pasien Baru'])
@section('content')
<div class="card">
    <div class="card-header">
        Pendaftaran Pasien Baru
    </div>
    <div class="card-body">
        <form action="/daftar" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="tanggal_daftar">Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar') ?? date('Y-m-d') }}">
                <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="id_pasien"> Nama Pasien</label>
                <select name="id_pasien" class="form-control">
                <option value="">-- Pilih Pasien --</option>
                @foreach ($listPasien as $item)
                    <option value="{{ $item->id }}" @selected(old('id_pasien') == $item->id)>
                    {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_pasien') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="poli">Poli</label>
                <select name="poli" class="form-control">
                    <option value="">-- Poli --</option>
                    @foreach ($listPoli as $key => $val)
                        <option value="{{ $key }}" @selected(old('poli') == $key)>{{ $val }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('poli') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="keluhan">Keluhan Pasien</label>
                <textarea name="keluhan"   rows="2" class="form-control">{{ old('keluhan') }}</textarea>
                <span class="text-danger">{{ @errors->first('keluhan') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>