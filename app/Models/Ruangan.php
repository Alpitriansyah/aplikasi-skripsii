<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lokasi',
        'kapasitas',
        'status',
        'status_level',
        'foto'
    ];

    protected $table = "ruangans";
    protected $primaryKey = 'id';

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class);
    }
}
