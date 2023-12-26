@extends('layouts.main')

@section('title', 'Tambah Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah Ruangan
                </div>
                <div class="card-body">
                    @dump($errors->all())
                    <form action="{{route('AdminCreateRuanganPost')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Ruangan</label>
                                <input type="text" class="form-control" id="inputEmail4" name="nama_ruangan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Lokasi</label>
                                <input type="text" class="form-control" id="inputEmail4" name="lokasi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kapasitas</label>
                                <input type="text" class="form-control" id="inputEmail4" name="kapasitas">Orang
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Boleh Dipinjam Untuk :</label>
                                <select id="inputState" class="form-control" name="status_level">
                                    <option value="Dosen" selected>Dosen</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="Tersedia" selected>Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
