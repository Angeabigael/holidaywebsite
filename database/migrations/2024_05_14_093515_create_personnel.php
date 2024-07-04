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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->integer('matricule');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('corps');
            $table->unsignedBigInteger('structures_id');
            $table->foreign('structures_id')->references('id')->on('structures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
