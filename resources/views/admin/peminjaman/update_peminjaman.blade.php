@extends('layouts.main')

@section('title', 'Edit Peminjaman')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    Ubah Peminjaman
                </div>
                <div class="card-body">
                    <form action="{{ route('AdminUpdatePeminjamanPost', $peminjaman->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Peminjam</label>
                                <input type="text" class="form-control" id="inputEmail4" name="nama_peminjam"
                                    value="{{ $peminjaman->nama_peminjam }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Ruangan</label>
                                <select id="inputState" class="form-control" name="ruangan_id">
                                    @foreach ($ruangan as $ruangan)
                                        <option value="{{ $ruangan->id }}" @selected($ruangan->id == $peminjaman->ruangan->id)>
                                            {{ $ruangan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Jurusan</label>
                                <select id="inputState" class="form-control" name="jurusan" disabled>
                                    <option value="Sistem Informasi" @selected('Sistem Informasi' == $peminjaman->jurusan)>Sistem Informasi</option>
                                    <option value="Informatika" @selected('Informatika' == $peminjaman->jurusan)>Informatika</option>
                                    <option value="Teknik Pertambangan" @selected('Teknik Pertambangan' == $peminjaman->jurusan)>Teknik Pertambangan
                                    </option>
                                    <option value="Teknik Sipil" @selected('Teknik Sipil' == $peminjaman->jurusan)>Teknik Sipil</option>
                                    <option value="Teknik Lingkungan" @selected('Teknik Lingkungan' == $peminjaman->jurusan)>Teknik Lingkungan
                                    </option>
                                    <option value="Teknik Kimia" @selected('Teknik Kimia' == $peminjaman->jurusan)>Teknik Kimia</option>
                                    <option value="Teknik Arsitektur" @selected('Teknik Arsitektur' == $peminjaman->jurusan)>Teknik Arsitektur
                                    </option>
                                    <option value="Teknik Elektro" @selected('Teknik Elektro' == $peminjaman->jurusan)>Teknik Elektro</option>
                                    <option value="Teknik Geologi" @selected('Teknik Geologi' == $peminjaman->jurusan)>Teknik Geologi</option>
                                    <option value="Admin" @selected('Admin' == $peminjaman->jurusan)>Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Keperluan</label>
                                <select id="inputState" class="form-control" name="keperluan">
                                    <option value="Seminar" @selected('Seminar' == $peminjaman->keperluan)>Seminar</option>
                                    <option value="Musyawarah Besar" @selected('Musyawarah Besar' == $peminjaman->keperluan)>Musyawarah Besar</option>
                                    <option value="Pelatihan" @selected('Pelatihan' == $peminjaman->keperluan)>Pelatihan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Deskripsi</label>
                                <input type="text" class="form-control" id="inputCity" name="deskripsi"
                                    value="{{ $peminjaman->deskripsi }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggalMulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggalMulai" name="tanggal_mulai"
                                    value="{{ $peminjaman->tanggal_mulai }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalSelesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai" name="tanggal_selesai"
                                    value="{{ $peminjaman->tanggal_selesai }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="Diproses" @selected('Diproses' == $peminjaman->status)>Diproses</option>
                                    <option value="Dipinjam" @selected('Dipinjam' == $peminjaman->status)>Dipinjam</option>
                                    <option value="Ditolak" @selected('Ditolak' == $peminjaman->status)>Ditolak</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="comment">
                                @if ($peminjaman->status == 'Ditolak')
                                    <label for="message">Nama Peminjam</label>
                                    <input type="text" class="form-control" id="message" name="message"
                                        value="{{ $peminjaman->message }}">
                                @endif
                                @if ($peminjaman->status == 'Dipinjam')
                                    <label for="input_surat_hasil">Input Surat Izin Peminjaman</label>
                                    <div class="input-group mb-3" id="input_surat_hasil">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Surat Kegiatan</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_surat_izin') is-invalid @enderror"
                                                id="file_surat_izin" name="file_surat_izin">
                                            <label class="custom-file-label" for="file_surat_izin">Choose file</label>
                                            @error('file_surat_izin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ route('DashboardPeminjamanAdmin') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('costum-js')
        <script>
            const selectStatus = document.getElementById('status');
            const comment = document.getElementById('comment');
            selectStatus.addEventListener('change', function(e) {
                if (e.target.value == 'Ditolak') {
                    comment.innerHTML =
                        `<label for="message">Message</label>
                                        <input type="text" class="form-control" id="message" name="message" value="{{ $peminjaman->message }}">`
                } else {
                    comment.innerHTML = '';
                }

                if (e.target.value == 'Dipinjam') {
                    comment.innerHTML = `<label for="input_surat_hasil">Input Surat Izin Peminjaman</label>
                                    <div class="input-group mb-3" id="input_surat_hasil">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Surat Izin</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_surat_izin') is-invalid @enderror"
                                                id="file_surat_izin" name="file_surat_izin">
                                            <label class="custom-file-label" for="file_surat_izin">Choose file</label>
                                            @error('file_surat_izin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>`
                } else {
                    comment.innerHTML = '';
                }
            });
        </script>
        <script>
            const selectStatus = document.getElementById('status');
        </script>
    @endpush
@endsection
