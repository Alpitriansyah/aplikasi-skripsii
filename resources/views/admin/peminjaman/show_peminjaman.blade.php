@extends('layouts.main')

@section('title', 'Detail Peminjaman')
@section('main')
    <div class="card card-shadow">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Nama Peminjam</th>
                    <th> : {{ $peminjaman->nama_peminjam }}</th>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <th> : {{ $peminjaman->jurusan }}</th>
                </tr>
                <tr>
                    <th>Ruangan</th>
                    <th> : {{ $peminjaman->ruangan->name }}</th>
                </tr>
                <tr>
                    <th>Keperluan</th>
                    <th> : {{ $peminjaman->keperluan }}</th>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <th> : {{ $peminjaman->deskripsi }}</th>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <th> : {{ $peminjaman->tanggal_mulai }}</th>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <th> : {{ $peminjaman->tanggal_selesai }}</th>
                </tr>
                <tr>
                    @if ($peminjaman->status == 'Diproses')
                        <th>Surat Peminjaman</th>
                        <th> : <button type="button" class="btn btn-primary btn-sm" id="show_surat">Buka Surat</button>
                        </th>
                    @endif
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($peminjaman->status == 'Diproses')
                        <th> : <span class="badge badge-pill badge-warning">{{ $peminjaman->status }}</span></th>
                    @endif
                    @if ($peminjaman->status == 'Ditolak')
                        <th> : <span class="badge badge-pill badge-danger">{{ $peminjaman->status }}</span></th>
                    @endif
                    @if ($peminjaman->status == 'Dipinjam')
                        <th> : <span class="badge badge-pill badge-success">{{ $peminjaman->status }}</span></th>
                    @endif
                </tr>
                @if ($peminjaman->message && $peminjaman->status === 'Ditolak')
                    <tr>
                        <th>Message</th>
                        <th> : {{ $peminjaman->message }}</th>
                    </tr>
                @endif
            </table>
            <a href="{{ route('DashboardPeminjamanAdmin') }}" class="btn btn-danger mt-4">Kembali</a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" width="100%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Surat</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ $peminjaman->file_surat }}" width="100%" height="50%"
                        frameborder="0">{{ $peminjaman->file_surat }}</iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @push('modal_surat-js')
        <script>
            $(document).ready(function() {
                $("#show_surat").click(function() {
                    $("#myModal").modal({
                        show: true
                    });
                });
            });
        </script>
    @endpush
@endsection
