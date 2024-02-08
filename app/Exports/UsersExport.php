<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    // public function view(): View
    // {
    //     return view('admin.peminjaman.index_peminjaman', ['pinjam' => Peminjaman::latest()->with('ruangan')->get()]);
    // }

    use Exportable;

    public function collection()
    {
        return Peminjaman::with('ruangan')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Peminjman',
            'Jurusan',
            'Ruangan',
            'Keperluan',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Deskripsi',
            'Surat Kegiatan',
            'Status',
            'Surat Peminjaman',
            'Created At'
        ];
    }
}
