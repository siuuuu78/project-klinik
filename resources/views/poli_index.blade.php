@extends('layouts.app_modern', ['title' => 'Data Poli'])
@section('content')

<div class="card">
    <div class="card-header">Data Poli</div>
    <div class="card-body">
        <h3>Data Pasien</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-14">
                    <a href="/poli/create" class="btn btn-primary btn-sm">Tambah Poli</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poli</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poli as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>

                        <form action="/poli/{{ $item->id }}" method="post" class="d-inline">
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
        {!! $poli->links() !!}
    </div>
</div>

@endsection