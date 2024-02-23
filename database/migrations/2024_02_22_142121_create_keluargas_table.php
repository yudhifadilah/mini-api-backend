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
        Schema::create('keluarga_santri', function (Blueprint $table) {
            $table->bigIncrements('id_keluarga');
            $table->uuid('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('hubungan_keluarga');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->decimal('penghasilan_bulanan', 10, 2); // decimal dengan 10 digit total dan 2 digit di belakang koma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
