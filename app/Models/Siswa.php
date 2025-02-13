<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table ='siswas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kelas_id',
        'nis',
        'nama',
        'alamat',
        'telepon',
    ];

    /**
     * Relasi many-to-one: setiap siswa berada di satu kelas.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
