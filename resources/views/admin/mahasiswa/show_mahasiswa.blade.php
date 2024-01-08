@extends('layouts.main')

@section('title', 'Detail Mahasiswa')
@section('main')
    <div class="card card-shadow">
        <div class="card-header">
            Detail Mahasiswa
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th> : {{ $mahasiswa->name }}</th>
                </tr>
                <tr>
                    <th>NIM</th>
                    <th> : {{ $mahasiswa->nim }}</th>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <th> : {{ $mahasiswa->jenis_kelamin }}</th>
                </tr>
                <tr>
                    <th>Level</th>
                    <th> : {{ $mahasiswa->level }}</th>
                </tr>
            </table>
            <a href="{{ route('AdminDashboardMahasiswa') }}" class="btn btn-danger mt-4">Kembali</a>
        </div>
    </div>
@endsection
