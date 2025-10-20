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
        Schema::create('sewa_lokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loker_id')->constrained('lokers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir')->nullable();
            $table->decimal('harga_per_hari', 10, 2);
            $table->decimal('harga_per_hari_denda', 10, 2);
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->enum('status_sewa', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_lokers');
    }
};
