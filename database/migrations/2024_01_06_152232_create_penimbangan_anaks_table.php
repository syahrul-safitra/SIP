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
        Schema::create('penimbangan_anaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anak');
            $table->string('nama');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->text('catatan');
            $table->date('tanggal');

            $table->foreign('kode_anak')
                ->references('kode')
                ->on('anaks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penimbangan_anaks');
    }
};
