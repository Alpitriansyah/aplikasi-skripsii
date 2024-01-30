@extends('layouts.main')

@section('title', 'Update User')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Update User
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateUserStore', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @dump($errors->all())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama User</label>
                                <input type="text" class="form-control @error('nama_user') is-invalid @enderror"
                                    id="inputEmail4" name="nama_user" value="{{ $user->name }}">
                                @error('nama_user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user-email">Email</label>
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                                    id="user_email" name="user_email" value="{{ $user->email }}">
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
                                    id="password_user" name="password_user" value="{{ $user->password }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control @error('jenisKelamin') is-invalid @enderror"
                                    id="jenisKelamin" name="jenisKelamin" value="{{ $user->jenis_kelamin }}">
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
                        <button type="submit" class="btn btn-warning mt-5">Ubah</button>
                        <a href="{{ route('DashboardUser') }}" class="btn btn-danger mt-5">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
