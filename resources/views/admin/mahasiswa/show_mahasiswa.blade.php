@extends('layouts.main')

@section('title', 'Detail Ruangan')
@section('main')
    <div class="card card-shadow">
        <div class="card-header">
            Detail Ruangan
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Ruangan</th>
                    <th> : {{ $ruang->name }}</th>
                </tr>
                <tr>
                    <th>Lokasi Ruangan</th>
                    <th> : {{ $ruang->lokasi }}</th>
                </tr>
                <tr>
                    <th>Kapasitas</th>
                    <th> : {{ $ruang->kapasitas }} Orang</th>
                </tr>
                <tr>
                    <th>Khusus</th>
                    <th> : {{ $ruang->status_level }}</th>
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($ruang->status == 'Tersedia')
                        <th> : <span class="badge badge-pill badge-success">{{ $ruang->status }}</span></th>
                    @endif
                    @if ($ruang->status == 'Tidak Tersedia')
                        <th> : <span class="badge badge-pill badge-danger">{{ $ruang->status }}</span></th>
                    @endif
                </tr>
            </table>
            <a href="{{ route('AdminDashboardMahasiswa') }}" class="btn btn-danger mt-4">Kembali</a>
        </div>
    </div>
@endsection
