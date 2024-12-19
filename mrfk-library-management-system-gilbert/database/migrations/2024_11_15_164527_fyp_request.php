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
        Schema::create('fyp_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarianID', false, true);
            $table->bigInteger('fypID', false, true)->nullable();
            $table->string('title')->nullable(); // Judul proyek akhir
            $table->string('student_name')->nullable(); // Nama mahasiswa yang buat
            $table->string('supervisor')->nullable(); // Nama dosen pembimbing
            $table->year('submission_year')->nullable(); // Tahun penyerahan
            $table->text('abstract')->nullable(); // Abstrak atau deskripsi singkat
            $table->enum('requestType', ['create', 'update', 'delete']);
            $table->timestamps();
            $table->index('librarianID');
            $table->foreign('librarianID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
