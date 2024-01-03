@extends('layouts.main')

@section('title', 'Detail Peminjaman')
@section('main')
    <div class="card card-shadow">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Peminjam</th>
                    <th> : {{ $peminjaman->nama_peminjam }}</th>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <th> : {{ $peminjaman->jurusan }}</th>
                </tr>
                <tr>
                    <th>Ruangan</th>
                    <th> : {{ $peminjaman->ruangan->name }}</th>
                </tr>
                <tr>
                    <th>Keperluan</th>
                    <th> : {{ $peminjaman->keperluan }}</th>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <th> : {{ $peminjaman->deskripsi }}</th>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <th> : {{ $peminjaman->tanggal_mulai }}</th>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <th> : {{ $peminjaman->tanggal_selesai }}</th>
                </tr>
                <tr>
                    <th>Status</th>
                    <th> : <span class="badge badge-pill badge-warning">{{ $peminjaman->status }}</span></th>
                </tr>
            </table>
            <a href="{{ route('DashboardPeminjamanAdmin') }}" class="btn btn-danger mt-4">Kembali</a>
        </div>
    </div>
@endsection
