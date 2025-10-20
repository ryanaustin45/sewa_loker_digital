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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sewa_loker_id')->constrained('sewa_lokers')->onDelete('cascade');
            $table->date('tanggal_bayar')->nullable();
            $table->decimal('total_bayar', 10, 2)->default(0);
            $table->enum('metode_bayar', ['cash', 'transfer', 'qris'])->nullable();
            $table->enum('status', ['belum_bayar', 'lunas', 'kurang'])->default('belum_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
