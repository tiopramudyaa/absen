<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_user', 'id');
    }

    public function riwayat_penilaian()
    {
        return $this->hasMany(RiwayatPenilaian::class, 'id_user', 'id');
    }
}
