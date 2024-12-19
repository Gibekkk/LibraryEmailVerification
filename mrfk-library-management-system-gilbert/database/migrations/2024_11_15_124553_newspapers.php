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
        Schema::create('newspapers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama koran
            $table->date('publication_date'); // Tanggal terbit
            $table->enum('publisher', ['Kompas', 'Tribun Timur', 'Fajar']); // Penerbit koran
            $table->string('language'); // Bahasa yang dipake
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newspapers');
    }
};
