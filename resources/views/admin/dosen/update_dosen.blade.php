@extends('layouts.main')

@section('title', 'Ubah Dosen')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Dosen
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateDosenPUT', ['id' => $dosen->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_dosen">Nama Dosen</label>
                                <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror"
                                    id="nama_dosen" name="nama_dosen" value="{{ $dosen->name }}">
                                @error('nama_user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" value="{{ $dosen->nip }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password_dosen">Password</label>
                                <input type="password" class="form-control @error('password_dosen') is-invalid @enderror"
                                    id="password_dosen" name="password_dosen" value="{{ $dosen->password }}">
                                @error('password_dosen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control @error('jenisKelamin') is-invalid @enderror"
                                    id="jenisKelamin" name="jenisKelamin" value="{{ $dosen->jenis_kelamin }}">
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
                                    <span class="input-group-text" id="image_text">Foto Dosen</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('image_dosen') is-invalid @enderror"
                                        id="image_dosen" name="image_dosen" value="{{ $dosen->foto }}">
                                    <label class="custom-file-label" for="image_dosen">Choose file</label>
                                    @error('image_dosen')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning mt-5">Ubah</button>
                        <a href="{{ route('AdminDashboardDosen') }}" class="btn btn-danger mt-5">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
