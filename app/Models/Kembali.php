<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kembali extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kembalis';

    protected $fillable = [
        'izin_id',
        'tgl_kembali',
        'denda',
    ];

    /**
     * Relasi ke model Izin
     */
    public function izin()
    {
        return $this->belongsTo(Izin::class);
    }
}
