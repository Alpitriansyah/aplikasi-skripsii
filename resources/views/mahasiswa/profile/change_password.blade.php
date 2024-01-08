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
                    <form action="{{ route('ChangePasswordMahasiswaPUT', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" id="inputEmail4" name="old_password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="inputEmail4" name="new_password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="repeat_password">Repeat Password</label>
                                <input type="password" class="form-control" id="inputEmail4" name="repeat_password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('ProfileMahasiswa') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
