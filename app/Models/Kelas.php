<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kelas',
    ];

    // Kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
