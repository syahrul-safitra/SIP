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
        Schema::create('periksa_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->string('nik_ibu');
            $table->string('berat_badan');
            $table->string('umur_kehamilan');
            $table->string('tindakan');
            $table->text('catatan');
            $table->date('tanggal');

            $table->foreign('nik_ibu')
                ->references('nik')
                ->on('ibus')
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
        Schema::dropIfExists('periksa_ibu_hamils');
    }
};
