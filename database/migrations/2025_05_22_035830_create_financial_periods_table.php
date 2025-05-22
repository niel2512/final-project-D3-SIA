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
        Schema::create('financial_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
            $table->year('tahun'); // Tahun periode keuangan

            // Input dari pengguna
            $table->decimal('laba_bersih', 15, 2)->nullable();
            $table->decimal('total_aset', 15, 2)->nullable();
            $table->decimal('total_utang', 15, 2)->nullable();
            $table->decimal('aset_lancar', 15, 2)->nullable();
            $table->decimal('utang_lancar', 15, 2)->nullable();

            // Hasil perhitungan variabel
            $table->decimal('x1', 15, 5)->nullable(); // Laba Bersih / Total Aset
            $table->decimal('x2', 15, 5)->nullable(); // Total Utang / Total Aset
            $table->decimal('x3', 15, 5)->nullable(); // Aset Lancar / Utang Lancar

            // Hasil Model Zmijewski
            $table->decimal('z_score', 15, 5)->nullable();
            $table->string('interpretasi')->nullable(); // "Bangkrut" atau "Sehat"

            $table->timestamps();

            // Membuat unik kombinasi bank_id dan tahun
            $table->unique(['bank_id', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_periods');
    }
};
