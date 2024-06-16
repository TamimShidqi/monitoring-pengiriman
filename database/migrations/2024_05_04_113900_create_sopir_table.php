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
        Schema::create('sopir', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->string('nik', 16)->unique();
            $table->date('tgl_lahir');
            $table->string('alamat', 50);
            $table->string('email', 50)->unique();
            $table->string('no_hp', 13);
            $table->date('masa_sim');
            $table->enum('status', ['ready', 'delivery'])->default('ready');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sopir');
    }
};
