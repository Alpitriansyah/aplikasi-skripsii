@extends('layouts.main')

@section('title', 'Tambah Mahasiswa')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminCreateMahasiswaPOST') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                    id="nama_mahasiswa" name="nama_mahasiswa">
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password_mahasiswa">Password</label>
                                <input type="password"
                                    class="form-control @error('password_mahasiswa') is-invalid @enderror"
                                    id="password_mahasiswa" name="password_mahasiswa">
                                @error('password_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select id="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror"
                                    name="jenisKelamin">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
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
                                <label for="jurusan">Jurusan</label>
                                <select id="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                                    name="jurusan">
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                    <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Geologi">Teknik Geologi</option>
                                </select>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_gambar">Input Gambar</label>
                                <div class="input-group" id="input_gambar">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image_text">Foto Mahasiswa</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image_mahasiswa') is-invalid @enderror"
                                            id="image_mahasiswa" name="image_mahasiswa">
                                        <label class="custom-file-label" for="image_mhs">Choose file</label>
                                        @error('image_mahasiswa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Tambah</button>
                        <a href="{{ route('AdminDashboardMahasiswa') }}" class="btn btn-danger mt-5">Kembali</a>
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
