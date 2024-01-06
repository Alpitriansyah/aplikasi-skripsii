@extends('layouts.main')

@section('title', 'Detail Dosen')
@section('main')
    <div class="card card-shadow">
        <div class="card-header">
            Detail Dosen
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Dosen</th>
                    <th> : {{ $dosen->name }}</th>
                </tr>
                <tr>
                    <th>NIP</th>
                    <th> : {{ $dosen->nip }}</th>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <th> : {{ $dosen->jenis_kelamin }}</th>
                </tr>
                <tr>
                    <th>Level</th>
                    <th> : {{ $dosen->level }}</th>
                </tr>
            </table>
            <a href="{{ route('AdminDashboardDosen') }}" class="btn btn-danger mt-4">Kembali</a>
        </div>
    </div>
@endsection
