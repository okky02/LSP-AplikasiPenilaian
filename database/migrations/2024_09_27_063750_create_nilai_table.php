<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('nim'); // Foreign key
            $table->string('nama');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->integer('nilai_tugas');
            $table->decimal('rata_rata_nilai', 5, 2);
            $table->string('nilai_akhir'); // Ubah dari integer ke string untuk menyimpan grade
            $table->timestamps();

            // Foreign key constraint to 'absen'
            $table->foreign('nim')->references('nim')->on('absen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
