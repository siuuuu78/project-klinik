@extends('layouts.app_modern', ['title' => 'Data Poli'])
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Poli</h5>
        <form action="/poli" method="POST" >
        @csrf
        <div class="form-group mt-1 mb-3">
                <label for="nama">Nama Poli</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" value="{{ old('nama') }}">
                <span class="text-danger"> {{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group mt-1 mb-3">
                <label for="biaya">Biaya Poli</label>
                <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                    name="biaya" value="{{ old('biaya') }}">
                <span class="text-danger"> {{ $errors->first('biaya') }}</span>
        </div>
        <div class="form-group mt-1 mb-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" value="{{ old('keterangan') }}">
                <span class="text-danger"> {{ $errors->first('keterangan') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>
@endsection