<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'nim',
        'nama',
        'nilai_uts',
        'nilai_uas',
        'nilai_tugas',
        'rata_rata_nilai',
        'nilai_akhir',
    ];

    // Menambahkan casting untuk 'nim'
    protected $casts = [
        'nim' => 'integer',
    ];

    /**
     * Relasi dengan model Absen
     */
    public function absen()
    {
        return $this->belongsTo(Absen::class, 'nim', 'nim');
    }
}
