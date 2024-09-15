<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minggu extends Model
{
    use HasFactory;
    protected $table = 'minggu_penilaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_minggu',
        'id_mahasiswa',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_minggu', 'id');
    }
}
