@extends('layouts.main')

@section('title', 'Tambah User')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah User
                </div>
                <div class="card-body">
                    <form action="{{ route('StoreUserAdmin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @dump($errors->all())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama User</label>
                                <input type="text" class="form-control @error('nama_user') is-invalid @enderror"
                                    id="inputEmail4" name="nama_user">
                                @error('nama_user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user-email">Email</label>
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                                    id="user_email" name="user_email">
                                @error('user_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password_user">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password_user" name="password_user">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control @error('jenisKelamin') is-invalid @enderror"
                                    id="jenisKelamin" name="jenisKelamin">
                                @error('jenisKelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Foto User</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('image_user') is-invalid @enderror" id="image_user"
                                        name="image_user">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image_user')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Tambah</button>
                        <a href="{{ route('DashboardUser') }}" class="btn btn-danger mt-5">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
