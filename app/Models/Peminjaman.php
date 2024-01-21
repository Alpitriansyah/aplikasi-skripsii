<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Peminjaman extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'dosen_id',
        'mahasiswa_id',
        'ruangan_id',
        'nama_peminjam',
        'jurusan',
        'keperluan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'status',
        'message'
    ];

    protected $table = "peminjamans";
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'dosen_id',
        'mahasiswa_id',
        'ruangan_id',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
