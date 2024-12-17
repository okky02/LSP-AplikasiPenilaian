<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Nilai;

class StudentController extends Controller
{
    /**
     * Menampilkan form input data mahasiswa
     */
    public function create()
    {   
        // Mengambil semua data nilai beserta relasi absen
        $nilai = Nilai::with('absen')->get();

    // Mengirimkan data nilai ke view
        return view('students.create', compact('nilai'));
    }

    /**
     * Menyimpan data mahasiswa ke dalam tabel absen dan nilai
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|integer|unique:absen,nim|unique:nilai,nim',
            'kehadiran1' => 'required|integer|min:0',
            'kehadiran2' => 'required|integer|min:0',
            'nilai_tugas' => 'required|integer|min:0|max:100',
            'nilai_uas' => 'required|integer|min:0|max:100',
            'nilai_uts' => 'required|integer|min:0|max:100',
        ]);

        // Hitung nilai kehadiran
        $nilai_kehadiran = ($validated['kehadiran1'] + $validated['kehadiran2']) / 2;

        // Simpan data ke tabel absen
        $absen = Absen::create([
            'nim' => $validated['npm'],
            'kehadiran1' => $validated['kehadiran1'],
            'kehadiran2' => $validated['kehadiran2'],
            'nilai_kehadiran' => $nilai_kehadiran,
        ]);

        // Hitung rata-rata nilai
        $rata_rata_nilai = ($validated['nilai_uts'] + $validated['nilai_uas'] + $validated['nilai_tugas']) / 3;

        // Tentukan grade berdasarkan rata-rata nilai
        if ($rata_rata_nilai >= 85) {
            $grade = 'A';
        } elseif ($rata_rata_nilai >= 75) {
            $grade = 'B';
        } elseif ($rata_rata_nilai >= 60) {
            $grade = 'C';
        } else {
            $grade = 'D';
        }

        // Simpan data ke tabel nilai
        $nilai = Nilai::create([
            'nim' => $validated['npm'],
            'nama' => $validated['nama'],
            'nilai_uts' => $validated['nilai_uts'],
            'nilai_uas' => $validated['nilai_uas'],
            'nilai_tugas' => $validated['nilai_tugas'],
            'rata_rata_nilai' => $rata_rata_nilai,
            'nilai_akhir' => $grade,
        ]);

        // Muat relasi absen
        $nilai->load('absen');

        // Redirect kembali dengan pesan sukses dan data nilai
        return redirect()->back()->with('success', 'Data berhasil disimpan')->with('nilai', $nilai);
    }
}
