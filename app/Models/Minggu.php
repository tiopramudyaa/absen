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
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
