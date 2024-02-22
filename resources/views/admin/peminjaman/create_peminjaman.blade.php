@extends('layouts.main')

@section('title', 'Tambah Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Tambah Peminjaman</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminCreatePeminjamanPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @dump($errors->all())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Peminjam</label>
                                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                                    id="inputEmail4" name="nama_peminjam">
                                @error('nama_peminjam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Ruangan</label>
                                <select id="inputState" class="form-control @error('ruangan_id') is-invalid @enderror"
                                    name="ruangan_id">
                                    @foreach ($ruangan as $ruangan)
                                        <option value="{{ $ruangan->id }}" selected>{{ $ruangan->name }}</option>
                                    @endforeach
                                </select>
                                @error('ruangan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Jurusan</label>
                                <select id="inputState" class="form-control @error('jurusan') is-invalid @enderror"
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
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Keperluan</label>
                                <select id="inputState" class="form-control @error('keperluan') is-invalid @enderror"
                                    name="keperluan">
                                    <option value="Seminar">Seminar</option>
                                    <option value="Musyawarah Besar">Musyawarah Besar</option>
                                    <option value="Pelatihan">Pelatihan</option>
                                </select>
                                @error('keperluan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="inputCity" name="deskripsi">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggalMulai">Tanggal Dan Jam Mulai</label>
                                <input type="datetime-local"
                                    class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggalMulai"
                                    name="tanggal_mulai">
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalSelesai">Tanggal Dan Jam Selesai</label>
                                <input type="datetime-local"
                                    class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggalSelesai"
                                    name="tanggal_selesai">
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="file_surat_form">File</label>
                                <div class="input-group mb-3" id="file_surat_form">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">File</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('file_surat') is-invalid @enderror"
                                            id="file_surat" name="file_surat">
                                        <label class="custom-file-label" for="file_surat">Choose file</label>
                                        @error('file_surat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-end">
                            <a href="{{ route('DashboardPeminjamanAdmin') }}" class="btn btn-warning mr-1">Kembali</a>
                            <button type="reset" class="btn btn-danger mr-1">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
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
