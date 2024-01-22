@extends('layouts.main')

@section('title', 'Edit Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Profile
                </div>
                <div class="card-body">
                    @dump($errors->all())
                    <form action="{{ route('UpdateProfileAdminPUT', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input_nama">Nama</label>
                                <input type="text" class="form-control" id="input_nama" name="nama"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jurusan</label>
                                <input type="text" class="form-control" id="jenisKelamin" name="jenis_kelamin"
                                    value="{{ $user->jenis_kelamin }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" id="level" name="level"
                                    value="{{ $user->level }}" disabled>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Gambar</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('ProfileAdmin') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('inputview-js')
        <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    @endpush
@endsection
