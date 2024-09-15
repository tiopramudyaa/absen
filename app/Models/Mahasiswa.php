<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'npm',
    ];

    // Relasi dengan model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_mahasiswa', 'id');
    }

    // Kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
