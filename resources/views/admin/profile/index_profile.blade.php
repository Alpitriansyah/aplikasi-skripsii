@extends('layouts.main')

@section('title', 'Profile')

@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-6">
            @if (Session::has('Success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('Success') }}
                </div>
            @endif
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="content-text m-0">
                        <h6 class="font-weight-bold text-primary">Profile</h6>
                    </div>
                    <div class="content-button">
                        <a href="{{ route('UpdateProfileAdmin', ['id' => $user->id]) }}" class="btn btn-primary">Setting
                            Profile</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('/storage/images/profile/' . $user->foto) }}" width="100"
                                    height="100" alt="Gambar Profile" class="img-thumbnail">
                                <a href="{{ route('UpdateProfileAdmin', ['id' => $user->id]) }}"
                                    class="btn btn-primary mt-3">Change Picture</a>
                            </div>
                        </div>
                        <div class="col-7">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>: {{ $user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>: {{ $user->email }}</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>: {{ $user->jenis_kelamin }}</th>
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
