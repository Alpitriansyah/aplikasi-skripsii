@extends('layouts.main')

@section('title', 'Peminjaman')

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (Session::has('Success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Success') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="font-weight-bold text-primary">Data Peminjaman</h6>
                <div class="">
                    <a href="{{ route('CreatePeminjamanMahasiswa') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Peminjam</th>
                                <th>Jurusan</th>
                                <th>Ruangan</th>
                                <th>Keperluan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjam as $item)
                                <tr>
                                    <td>{{ $item->nama_peminjam }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>{{ $item->ruangan->name }}</td>
                                    <td>{{ $item->keperluan }}</td>
                                    <td>{{ $item->tanggal_mulai }}</td>
                                    <td>{{ $item->tanggal_selesai }}</td>
                                    <td>
                                        @if ($item->status == 'Diproses')
                                            <span class="badge badge-pill badge-warning">{{ $item->status }}</span>
                                        @endif
                                        @if ($item->status == 'Dipinjam')
                                            <span class="badge badge-pill badge-success">{{ $item->status }}</span>
                                        @endif
                                        @if ($item->status == 'Ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('ShowDetailPeminjamanMahasiswa', ['id' => $item->id]) }}"
                                                type="button" class="btn btn-primary">Detail</a>
                                            @if (Auth::guard('user')->user())
                                                @if (Auth::guard('user')->user()->id == Auth::guard('user')->user()->id)
                                                    <a href="{{ route('UpdatePeminjamanMahasiswa', ['id' => $item->id]) }}"
                                                        type="button" class="btn btn-warning">Edit</a>
                                                    <form
                                                        action="{{ route('HapusPeminjamanMahasiswa', ['id' => $item->id]) }}"
                                                        method="POST" type="button" class="btn btn-danger p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger m-0">Hapus</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
