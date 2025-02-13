<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Izin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'izins';

    protected $fillable = [
        'user_id',
        'siswa_id',
        'tgl_pulang',
        'tgl_kembali',
        'status',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Relasi one-to-one ke model Kembali
     */
    public function kembali()
    {
        return $this->hasOne(Kembali::class);
    }
}
