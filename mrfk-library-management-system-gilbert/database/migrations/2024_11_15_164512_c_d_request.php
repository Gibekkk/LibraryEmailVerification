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
        Schema::create('cds_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarianID', false, true);
            $table->bigInteger('cdID', false, true)->nullable();
            $table->string('title')->nullable(); // Judul CD
            $table->string('artist'); // Nam->nullable()a artis/band
            $table->string('publisher')->nullable(); // Nama penerbit
            $table->year('release_year')->nullable(); // Tahun rilis
            $table->string('genre')->nullable(); // Genre musiknya
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
