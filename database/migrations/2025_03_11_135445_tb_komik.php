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
        schema::create('tb_komik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komik');
            $table->string('genre');
            $table->boolean('status');
            $table->string('gambar_komik');
            $table->string('sinopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_komik');
    }
};
