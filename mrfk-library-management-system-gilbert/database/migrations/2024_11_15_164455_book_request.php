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
        Schema::create('book_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarianID', false, true);
            $table->bigInteger('bookID', false, true)->nullable();
            $table->string('judul')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('penulis')->nullable();
            $table->integer('tahun_terbit')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->boolean('isEbook')->nullable();
            $table->string('ebookLink')->nullable();
            $table->boolean('isBorrowed')->nullable();
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