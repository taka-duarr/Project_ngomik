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
        Schema::create('tb_chapter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_chapter');
            $table->foreignId('id_komik')->constrained('tb_komik')->onDelete('cascade'); // Foreign Key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_chapter');
    }
};
