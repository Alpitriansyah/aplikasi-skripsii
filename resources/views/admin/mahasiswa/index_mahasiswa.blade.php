@extends('layouts.main')

@section('title', 'Mahasiswa')

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
                <h6 class="font-weight-bold text-primary">Data Mahasiswa</h6>
                <div class="">
                    <a href="{{ route('AdminCreateMahasiswa') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Jenis Kelamin</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('AdminShowDetailMahasiswa', ['id' => $item->id]) }}"
                                                type="button" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('AdminUpdateMahasiswa', ['id' => $item->id]) }}"
                                                type="button" class="btn btn-warning">Edit</a>
                                            <form action="" method="POST" type="button" class="btn btn-danger p-0"
                                                onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Hapus</button>
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
