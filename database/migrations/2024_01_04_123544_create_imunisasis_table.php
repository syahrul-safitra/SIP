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
        Schema::create('imunisasis', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_imunisasi', [
                'BC 6 POLI I',
                'DPT 1 POLI II',
                'DPT 2 POLI III',
                'DPT 3 POLI VI',
                'DPT 4',
                'CMPK 1',
                'CMPK 2',
                'IPP',
                'PCV 1',
                'PCV 2',
                'VIT A'
            ]);
            $table->string('kode_anak');
            $table->text('catatan')->nullable();
            $table->string('nama_anak');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('kode_anak')
                ->references('kode')
                ->on('anaks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imunisasis');
    }
};
