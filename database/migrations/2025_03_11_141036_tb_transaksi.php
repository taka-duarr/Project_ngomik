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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('tb_user')->onDelete('cascade');
            $table->foreignId('id_paket')->constrained('tb_paket')->onDelete('cascade');
            $table->foreignId('id_pembayaran')->constrained('tb_pembayaran')->onDelete('cascade');
            $table->integer('total_bayar');
            $table->timestamps();
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
