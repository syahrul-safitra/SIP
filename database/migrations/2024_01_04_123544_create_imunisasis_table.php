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
            $table->enum('jenis_imunisasi', ['Hepatitis B', 'Polio', 'BCG', 'DPT', 'Hib', 'Campak', 'MMR', 'PCV', 'Rotavirus', 'Influenza', 'Tipes', 'Hepatitis A', 'Varisela', 'HPV', 'Japanese encephalitis', 'Dengue', 'COVID-19']);
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
