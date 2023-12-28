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
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="" width="100" height="100" alt="Gambar Profile">
                            </div>
                        </div>
                        <div class="col-7">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>: {{$user->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>: {{$user->email}}</th>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <th>: {{$user->password}}</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>: {{$user->jenis_kelamin}}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
