@extends('layouts.main')

@section('title', 'Tambah Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Tambah Peminjaman</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('AdminCreatePeminjamanPost')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Peminjam</label>
                                <input type="text" class="form-control" id="inputEmail4" name="nama_peminjam">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Ruangan</label>
                                <select id="inputState" class="form-control" name="ruangan">
                                    <option value="D304" selected>D304</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Jurusan</label>
                                <select id="inputState" class="form-control" name="jurusan">
                                    <option value="Si" selected>Sistem Informasi</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Keperluan</label>
                                <select id="inputState" class="form-control" name="keperluan">
                                    <option value="seminar" selected>Seminar</option>
                                    <option value="">Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Deskripsi</label>
                                <input type="text" class="form-control" id="inputCity" name="deskripsi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggalMulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggalMulai" name="tanggal_mulai">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalSelesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai" name="tanggal_selesai">
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-end">
                            <a href="{{route('DashboardPeminjamanAdmin')}}" class="btn btn-warning mr-1">Kembali</a>
                            <button type="reset" class="btn btn-danger mr-1">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
