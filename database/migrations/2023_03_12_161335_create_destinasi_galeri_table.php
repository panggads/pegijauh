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
        Schema::create('destinasi_galeri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_destinasi');
            $table->string('foto');
            $table->string('keterangan')->nullable();
            $table->foreign('id_destinasi')->references('id')->on('destinasi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_galeri');
    }
};
