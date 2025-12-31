<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_wali',
        'alamat',
        'pendidikan',
        'tanggal_masuk',
        'tanggal_keluar',
        'foto_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

