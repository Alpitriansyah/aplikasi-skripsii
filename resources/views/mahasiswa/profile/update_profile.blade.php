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
                    <form action="{{ route('UpdateProfileMahasiswaPUT', ['id' => $mahasiswa->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_mahasiswa">Nama</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                    id="nama_mahasiswa" value="{{ $mahasiswa->name }}" name="nama_mahasiswa">
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" value="{{ $mahasiswa->nim }}"
                                    readonly name="nim">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jurusan">Jurusan</label>
                                <input type="text"
                                    class="form-control @error('jurusan')
                                    is-invalid
                                @enderror"
                                    id="jurusan" value="{{ $mahasiswa->jurusan }}" name="jurusan">
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenisKelamin"
                                    value="{{ $mahasiswa->jenis_kelamin }}" readonly name="jenisKelamin">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Gambar</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                        id="image" name="image" value="{{ $mahasiswa->foto }}">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-end">
                            <a href="{{ route('ProfileMahasiswa') }}" class="btn btn-warning mr-1">Kembali</a>
                            <button type="reset" class="btn btn-danger mr-1">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
