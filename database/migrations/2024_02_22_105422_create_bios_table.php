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
        Schema::create('bios', function (Blueprint $table) {
            $table->bigIncrements('id_bio');
            $table->uuid('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('hobi')->nullable();
            $table->string('keahlian')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('aktivitas')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('ukuran_baju')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->text('motivasi')->nullable();
            $table->text('get_informasi')->nullable();
            $table->timestamps();
        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bios');
    }
};
