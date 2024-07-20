@extends('layouts.app_modern', ['title' => 'Edit Pendaftaran Pasien'])
@section('content')

<div class="card">
    <div class="card-header">
        Edit Pendaftaran Pasien
    </div>
    <div class="card-body">
        <form action="/daftar/{{ $daftar->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label for="tanggal_daftar">Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar" class="form-control" value="{{ old('tanggal_daftar', $daftar->tanggal_daftar) }}">
                <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="id_pasien">Nama Pasien</label>
                <select name="id_pasien" class="form-control select2">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach ($listPasien as $item)
                        <option value="{{ $item->id }}" @selected(old('id_pasien', $daftar->id_pasien) == $item->id)>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_pasien') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="poli_id">Poli</label>
                <select name="poli_id" class="form-control">
                    <option value="">-- Poli --</option>
                    @foreach ($listPoli as $itemPoli)
                        <option value="{{ $itemPoli->id }}" @selected(old('poli_id', $daftar->poli_id) == $itemPoli->id)>
                            {{ $itemPoli->nama }} - {{ $itemPoli->biaya }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('poli_id') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="keluhan">Keluhan Pasien</label>
                <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan', $daftar->keluhan) }}</textarea>
                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/daftar" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
