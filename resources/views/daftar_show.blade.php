@extends('layouts.app_modern', ['title' => 'Detail Pendaftaran Pasien'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DATA PENDAFTARAN {{ strtoupper($daftar->pasien->nama) }}</div>
                <div class="card-body">
                    <h4>Data Pasien</h4>
                    <table width=100%>
                        <tbody>
                            <tr>
                                <th width=15%>No Pasien</th>
                                <td>: {{ $daftar->pasien->no_pasien }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>: {{ $daftar->pasien->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $daftar->pasien->jenis_kelamin }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>