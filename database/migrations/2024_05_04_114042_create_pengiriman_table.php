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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sopir_id')->constrained('sopir');
            $table->foreignId('mobil_id')->constrained('mobil');
            $table->foreignId('jenis_id')->constrained('jenis');
            $table->string('perusahaan', 100);
            $table->string('alamat', 100);
            $table->date('date_order');
            $table->integer('liter');
            $table->integer('jarak');
            $table->integer('tarif');
            $table->integer('total');
            $table->enum('status', ['pending', 'pick_up', 'on_delivery', 'arrived'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
