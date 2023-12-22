@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah Peminjaman
                </div>
                <div class="card-body">
                    @dump($errors->all())
                    <form action="">
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
                                <select id="inputState" class="form-control" name="jurusan" disabled>
                                    <option value="Si" selected>Sistem Informasi</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Keperluan</label>
                                <select id="inputState" class="form-control" name="keperluan" disabled>
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
                        @if (Auth::guard('mahasiswa')->user()->check()->level = 'mhs')    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="seminar" selected>Diproses</option>
                                        <option value="">Dipinjam</option>
                                        <option value="">Ditolak</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
