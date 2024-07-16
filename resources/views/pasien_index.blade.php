@extends('mylayout')
@section('content')

<div class="card">
    <div class="card-body">
        <h3>Data Pasien</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl Buat</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_pasien }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ Storage::url($item->foto) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pasien->links() !!}
    </div>
</div>

@endsection