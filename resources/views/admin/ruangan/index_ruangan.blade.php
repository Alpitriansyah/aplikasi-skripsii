@extends('layouts.main')

@section('title', 'Ruangan')

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
                    <a href="{{ route('AdminCreateRuangan') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Ruangan</th>
                                <th>Lokasi</th>
                                <th>Kapasitas</th>
                                <th>Khusus</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangan as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->kapasitas }} Orang</td>
                                    <td>{{ $item->status_level }}</td>
                                    <td>
                                        @if ($item->status == 'Tersedia')
                                            <span class="badge badge-pill badge-success">Tersedia</span>
                                    </td>
                            @endif
                            @if ($item->status == 'Tidak Tersedia')
                                <span class="badge badge-pill badge-danger">Tidak Tersedia</span></td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <a href="" type="button" class="btn btn-primary">Detail</a>
                                    <a href="" type="button" class="btn btn-warning">Edit</a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-0">Hapus</button>
                                    </form>
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
