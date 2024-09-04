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
        // Membuat tabel 'game'
        Schema::create('game', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Kolom judul game
            $table->string('genre'); // Kolom genre game
            $table->text('description')->nullable(); // Kolom deskripsi game, bisa null
            $table->date('release_date')->nullable(); // Kolom tanggal rilis, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel 'game' jika rollback
        Schema::dropIfExists('game');
    }
};
