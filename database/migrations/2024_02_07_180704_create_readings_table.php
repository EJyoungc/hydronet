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
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->integer('temp');
            $table->integer('uscm');
            $table->integer('ppm');
            $table->integer('ph');
            $table->integer('hydrophonic_id');
            $table->integer('user_id');
            $table->foreignId('growth_session_id')->constrained('growth_sessions')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};
