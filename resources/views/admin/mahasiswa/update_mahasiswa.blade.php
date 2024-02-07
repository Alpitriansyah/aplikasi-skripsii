@extends('layouts.main')

@section('title', 'Ubah Mahasiswa')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdateMahasiswaPUT', ['id' => $mahasiswa->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                    id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->name }}">
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" value="{{ $mahasiswa->nim }}">
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
                                    id="password_mahasiswa" name="password_mahasiswa" value="{{ $mahasiswa->password }}">
                                @error('password_mahasiswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                    <option value="Laki-Laki" @selected('Laki-Laki' == $mahasiswa->jenis_kelamin)>Laki-Laki</option>
                                    <option value="Perempuan" @selected('Perempuan' == $mahasiswa->jenis_kelamin)>Perempuan</option>
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
                                <select id="jurusan" class="form-control" name="jurusan">
                                    <option value="Sistem Informasi" @selected('Sistem Informasi' == $mahasiswa->jurusan)>Sistem Informasi</option>
                                    <option value="Informatika" @selected('Informatika' == $mahasiswa->jurusan)>Informatika</option>
                                    <option value="Teknik Pertambangan" @selected('Teknik Pertambangan' == $mahasiswa->jurusan)>Teknik Pertambangan
                                    </option>
                                    <option value="Teknik Sipil" @selected('Teknik Sipil' == $mahasiswa->jurusan)>Teknik Sipil</option>
                                    <option value="Teknik Lingkungan" @selected('Teknik Lingkungan' == $mahasiswa->jurusan)>Teknik Lingkungan
                                    </option>
                                    <option value="Teknik Kimia" @selected('Teknik Kimia' == $mahasiswa->jurusan)>Teknik Kimia</option>
                                    <option value="Teknik Arsitektur" @selected('Teknik Arsitektur' == $mahasiswa->jurusan)>Teknik Arsitektur
                                    </option>
                                    <option value="Teknik Elektro" @selected('Teknik Elektro' == $mahasiswa->jurusan)>Teknik Elektro</option>
                                    <option value="Teknik Geologi" @selected('Teknik Geologi' == $mahasiswa->jurusan)>Teknik Geologi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_gambar">Input Gambar</label>
                                <div class="input-group mb-3" id="input_gambar">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image_text">Foto Mahasiswa</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image_mhs') is-invalid @enderror"
                                            id="image_mahasiswa" name="image_mahasiswa">
                                        <label class="custom-file-label" for="image_mahasiswa">Choose file</label>
                                        @error('image_mhs')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning mt-5">Ubah</button>
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
