@extends('layouts.main')

@section('title', 'Edit Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Peminjaman
                </div>
                <div class="card-body">
                    @dump($errors->all())
                    <form action="{{ route('AdminUpdatePeminjamanPost', $peminjaman->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Peminjam</label>
                                <input type="text" class="form-control" id="inputEmail4" name="nama_peminjam"
                                    value="{{ $peminjaman->nama_peminjam }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Ruangan</label>
                                <select id="inputState" class="form-control" name="ruangan_id">
                                    @foreach ($ruangan as $ruangan)
                                        <option value="{{ $ruangan->id }}" @selected($ruangan->id == $peminjaman->ruangan->id)>
                                            {{ $ruangan->name }}
                                        </option>
                                    @endforeach
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
                                <select id="inputState" class="form-control" name="keperluan">
                                    <option value="seminar" selected>Seminar</option>
                                    <option value="seminar" selected>Musyawarah Besar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Deskripsi</label>
                                <input type="text" class="form-control" id="inputCity" name="deskripsi"
                                    value="{{ $peminjaman->deskripsi }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggalMulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggalMulai" name="tanggal_mulai"
                                    value="{{ $peminjaman->tanggal_mulai }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalSelesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai" name="tanggal_selesai"
                                    value="{{ $peminjaman->tanggal_selesai }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option value="Diproses" selected>Diproses</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('DashboardPeminjamanAdmin') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
