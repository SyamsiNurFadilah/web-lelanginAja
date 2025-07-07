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
        Schema::table('auctioneer_registrations', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'menunggu konfirmasi', 'nonaktif'])->default('menunggu konfirmasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auctioneer_registrations', function (Blueprint $table) {
            //
        });
    }
};
