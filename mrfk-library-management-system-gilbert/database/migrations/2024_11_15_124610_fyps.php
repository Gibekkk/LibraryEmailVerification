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
        Schema::create('final_year_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul proyek akhir
            $table->string('student_name'); // Nama mahasiswa yang buat
            $table->string('supervisor'); // Nama dosen pembimbing
            $table->year('submission_year'); // Tahun penyerahan
            $table->text('abstract'); // Abstrak atau deskripsi singkat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_year_projects');
    }
};
