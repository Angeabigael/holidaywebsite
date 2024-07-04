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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->longtext('motif');
            $table->string('statut');
            $table->date('date_debut_conge');
            $table->date('date_fin_conge');
            $table->integer('periode_conge');
            $table->unsignedBigInteger('personnels_id');
            $table->foreign('personnels_id')->references('id')->on('personnels');
            $table->unsignedBigInteger('types_demandes_id');
            $table->foreign('types_demandes_id')->references('id')->on('types_demandes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
