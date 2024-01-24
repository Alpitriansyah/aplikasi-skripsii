@extends('layouts.main')

@section('title', 'Change Password')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Password
                </div>
                <div class="card-body">
                    @dump($errors->all())
                    <form action="{{ route('ChangePasswordAdminPUT', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                                @error('old_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="new_password">New Password</label>
                                <input type="password"
                                    class="form-control @error('new_password')
                                    is-invalid @enderror"
                                    id="new_password" name="new_password">
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="repeat_password">Repeat Password</label>
                                <input type="password" class="form-control @error('repeat_password') is-invalid @enderror"
                                    id="repeat_password" name="repeat_password">
                                @error('repeat_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('ProfileAdmin') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
