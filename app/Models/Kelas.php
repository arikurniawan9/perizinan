<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama_kelas','nama_walas'];

    /**
     * Relasi one-to-many: satu kelas memiliki banyak siswa.
     */
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
