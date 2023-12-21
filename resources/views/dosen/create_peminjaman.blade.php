@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah Peminjaman
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Peminjam</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">NIM</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Jurusan</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Keperluan</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="">Samarinda</option>
                                    <option>Samarinda</option>
                                    <option>Samarinda</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Deskripsi</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
