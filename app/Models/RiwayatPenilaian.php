<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenilaian extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'riwayat_penilaian';

    // Primary Key
    protected $primaryKey = 'id_riwayat';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'id_penilaian',
        'id_user_ubah',
        'nilai_lama',
        'nilai_baru',
    ];

    // Relasi dengan model Penilaian
    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'id_penilaian', 'id_penilaian');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_ubah', 'id_user');
    }

    // Kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'waktu_ubah',
        'created_at',
        'updated_at',
    ];
}
