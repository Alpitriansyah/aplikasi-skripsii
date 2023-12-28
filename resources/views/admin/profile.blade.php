@extends('layouts.main')

@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="content-text m-0">
                        <h6 class="font-weight-bold text-primary">Profile</h6>
                    </div>
                    <div class="content-button">
                        <button class="btn btn-primary">Setting Profile</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="" alt="Gambar Profile">
                        </div>
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>: Indra</th>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <th>: 40</th>
                                    </tr>
                                    <tr>
                                        <th>Jurusan</th>
                                        <th>: 40</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>: 40</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
