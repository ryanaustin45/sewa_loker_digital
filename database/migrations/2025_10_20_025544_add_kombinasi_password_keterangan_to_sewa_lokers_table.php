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
        Schema::table('sewa_lokers', function (Blueprint $table) {
            $table->string('kombinasi_password', 20)
                ->nullable()
                ->after('status_sewa');
            $table->string('keterangan_loker')
                ->default('belum dibuka')
                ->after('kombinasi_password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sewa_lokers', function (Blueprint $table) {
            $table->dropColumn(['kombinasi_password', 'keterangan_loker']);
        });
    }
};
