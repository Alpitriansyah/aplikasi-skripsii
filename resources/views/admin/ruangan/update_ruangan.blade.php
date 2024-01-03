@extends('layouts.main')

@section('title', 'Update Ruangan')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Ruangan
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateRuanganPut', ['id' => $ruang->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Ruangan</label>
                                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror"
                                    id="inputEmail4" name="nama_ruangan" value="{{ $ruang->name }}">
                                @error('nama_ruangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Lokasi</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                    id="inputEmail4" name="lokasi" value="{{ $ruang->lokasi }}">
                                @error('lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kapasitas</label>
                                <input type="text" class="form-control @error('kapasitas') is-invalid @enderror"
                                    id="inputEmail4" name="kapasitas" value="{{ $ruang->kapasitas }}">Orang
                                @error('kapasitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Boleh Dipinjam Untuk :</label>
                                <select id="inputState" class="form-control @error('status_level') is-invalid @enderror"
                                    name="status_level">
                                    <option value="Dosen" @selected('Dosen' == $ruang->status_level)>Dosen</option>
                                    <option value="Mahasiswa" @selected('Mahasiswa' == $ruang->status_level)>Mahasiswa</option>
                                </select>
                                @error('status_level')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control @error('status') is-invalid @enderror"
                                    name="status">
                                    <option value="Tersedia" @selected('Tersedia' == $ruang->status)>Tersedia</option>
                                    <option value="Tidak Tersedia" @selected('Tidak Tersedia' == $ruang->status)>Tidak Tersedia</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('DashboardRuangan') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
