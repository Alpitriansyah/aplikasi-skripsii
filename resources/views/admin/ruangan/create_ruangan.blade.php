@extends('layouts.main')

@section('title', 'Tambah Ruangan')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah Ruangan
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminCreateRuanganPost') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Ruangan</label>
                                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror"
                                    id="inputEmail4" name="nama_ruangan">
                                @error('nama_ruangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Lokasi</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                    id="inputEmail4" name="lokasi">
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
                                    id="inputEmail4" name="kapasitas">Orang
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
                                    <option value="Dosen" selected>Dosen</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
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
                                    <option value="Tersedia" selected>Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ route('DashboardRuangan') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
