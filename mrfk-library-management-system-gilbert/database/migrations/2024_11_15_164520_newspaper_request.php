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
        Schema::create('newspaper_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarianID', false, true);
            $table->bigInteger('newspaperID', false, true)->nullable();
            $table->string('name')->nullable(); // Nama koran
            $table->date('publication_date')->nullable(); // Tanggal terbit
            $table->enum('publisher', ['Kompas', 'Tribun Timur', 'Fajar'])->nullable(); // Penerbit koran
            $table->string('language')->nullable(); // Bahasa yang dipake
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
