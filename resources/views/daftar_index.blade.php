@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')

<div class="card">
    <div class="card-body">
        <h3>Data Pendaftaran</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-12">
                    <a href="/daftar/create" class="btn btn-primary btn-sm">Tambah Pendaftaran</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pendaftaran</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->pasien->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->poli->nama }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>
                        <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm ml-2">Detail</a>

                        <form action="/daftar/{{ $item->id }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin?')">
                            Hapus
                        </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links() !!}
    </div>
</div>

@endsection