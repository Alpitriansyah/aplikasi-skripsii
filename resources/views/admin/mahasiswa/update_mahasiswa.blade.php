@extends('layouts.main')

@section('title', 'Ubah Mahasiswa')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateMahasiswaPUT', ['id' => $mahasiswa->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                    id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->name }}">
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" value="{{ $mahasiswa->nim }}">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password_mahasiswa">Password</label>
                                <input type="password"
                                    class="form-control @error('password_mahasiswa') is-invalid @enderror"
                                    id="password_mahasiswa" name="password_mahasiswa" value="{{ $mahasiswa->password }}">
                                @error('password_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control @error('jenisKelamin') is-invalid @enderror"
                                    id="jenisKelamin" name="jenisKelamin" value="{{ $mahasiswa->jenis_kelamin }}">
                                @error('jenisKelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="image_text">Foto Mahasiswa</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image_mhs') is-invalid @enderror"
                                        id="image_mahasiswa" name="image_mahasiswa">
                                    <label class="custom-file-label" for="image_mahasiswa">Choose file</label>
                                    @error('image_mhs')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning mt-5">Ubah</button>
                        <a href="{{ route('AdminDashboardMahasiswa') }}" class="btn btn-danger mt-5">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
