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
        Schema::create('solde_conges', function (Blueprint $table) {
            $table->id();
            $table->integer('solde_initial');
            $table->integer('solde_final');
            $table->year('annee');
            $table->unsignedBigInteger('personnels_id');
            $table->foreign('personnels_id')->references('id')->on('personnels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solde_conges');
    }
};
