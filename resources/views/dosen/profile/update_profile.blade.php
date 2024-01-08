@extends('layouts.main')

@section('title', 'Edit Profile')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Ubah Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('UpdateProfileDosenPUT', ['id' => $mahasiswa->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama</label>
                                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                                    id="inputEmail4" value="{{ $mahasiswa->name }}" name="nama_peminjam">
                                @error('nama_peminjam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">NIM</label>
                                <input type="text" class="form-control" id="inputEmail4" value="{{ $mahasiswa->nim }}"
                                    disabled name="nama_peminjam">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Jurusan</label>
                                <input type="text" class="form-control" id="inputEmail4"
                                    value="{{ $mahasiswa->jurusan }}" name="nama_peminjam">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="inputEmail4"
                                    value="{{ $mahasiswa->jenis_kelamin }}" disabled name="nama_peminjam">
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-end">
                            <a href="{{ route('ProfileDosen') }}" class="btn btn-warning mr-1">Kembali</a>
                            <button type="reset" class="btn btn-danger mr-1">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
