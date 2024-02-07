@extends('layouts.main')

@section('title', 'Ubah Dosen')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Dosen
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateDosenPUT', ['id' => $dosen->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_dosen">Nama Dosen</label>
                                <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror"
                                    id="nama_dosen" name="nama_dosen" value="{{ $dosen->name }}">
                                @error('nama_user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" value="{{ $dosen->nip }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password_dosen">Password</label>
                                <input type="password" class="form-control @error('password_dosen') is-invalid @enderror"
                                    id="password_dosen" name="password_dosen" value="{{ $dosen->password }}">
                                @error('password_dosen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                    <option value="Laki-Laki" @selected('Laki-Laki' == $dosen->jenis_kelamin)>Laki-Laki</option>
                                    <option value="Perempuan" @selected('Perempuan' == $dosen->jenis_kelamin)>Perempuan</option>
                                </select>
                                @error('jenisKelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Jurusan</label>
                                <select id="inputState" class="form-control" name="jurusan">
                                    <option value="Sistem Informasi" @selected('Sistem Informasi' == $dosen->jurusan)>Sistem Informasi</option>
                                    <option value="Informatika" @selected('Informatika' == $dosen->jurusan)>Informatika</option>
                                    <option value="Teknik Pertambangan" @selected('Teknik Pertambangan' == $dosen->jurusan)>Teknik Pertambangan
                                    </option>
                                    <option value="Teknik Sipil" @selected('Teknik Sipil' == $dosen->jurusan)>Teknik Sipil</option>
                                    <option value="Teknik Lingkungan" @selected('Teknik Lingkungan' == $dosen->jurusan)>Teknik Lingkungan
                                    </option>
                                    <option value="Teknik Kimia" @selected('Teknik Kimia' == $dosen->jurusan)>Teknik Kimia</option>
                                    <option value="Teknik Arsitektur" @selected('Teknik Arsitektur' == $dosen->jurusan)>Teknik Arsitektur
                                    </option>
                                    <option value="Teknik Elektro" @selected('Teknik Elektro' == $dosen->jurusan)>Teknik Elektro</option>
                                    <option value="Teknik Geologi" @selected('Teknik Geologi' == $dosen->jurusan)>Teknik Geologi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_gambar">Input Gambar</label>
                                <div class="input-group mb-3" id="input_gambar">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image_text">Foto Dosen</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image_dosen') is-invalid @enderror"
                                            id="image_dosen" name="image_dosen" value="{{ $dosen->foto }}">
                                        <label class="custom-file-label" for="image_dosen">Choose file</label>
                                        @error('image_dosen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning mt-5">Ubah</button>
                        <a href="{{ route('AdminDashboardDosen') }}" class="btn btn-danger mt-5">Kembali</a>
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
