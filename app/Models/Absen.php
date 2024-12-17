<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = [
        'nim',
        'kehadiran1',
        'kehadiran2',
        'nilai_kehadiran',
    ];

    // Menambahkan casting untuk 'nim'
    protected $casts = [
        'nim' => 'integer',
    ];

    /**
     * Relasi dengan model Nilai
     */
    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'nim', 'nim');
    }
}
