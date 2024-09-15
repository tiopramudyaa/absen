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
        'id_kelas',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function mingguPenilaian()
    {
        return $this->hasMany(Minggu::class, 'id_mahasiswa', 'id');
    }

    // Kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
