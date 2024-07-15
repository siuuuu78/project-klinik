@extends('mylayout', ['title' => 'Data Pasien'])
@section('content')

<div class="card">
    <div class="card-body">
        Ini adalah halaman index pasien.
        <a href="{{ route('pasien.create') }}">Tambah Data</a>
    </div>
</div>

@endsection