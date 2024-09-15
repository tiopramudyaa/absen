<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'penilaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mahasiswa',
        'tanggal',
        'jenis_penilaian',
        'nilai',
        'id_user',
        'urutan',
        'komen',
    ];

    // Relasi dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'tanggal',
        'waktu_penilaian',
        'created_at',
        'updated_at',
    ];
}
