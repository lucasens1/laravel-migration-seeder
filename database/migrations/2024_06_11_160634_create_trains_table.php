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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            # Aggiungo i campi del treno
            $table->string('azienda')->nullable();
            $table->string('stazione_partenza');
            $table->string('stazione_arrivo');
            $table->time('orario_partenza');
            $table->time('orario_arrivo');
            $table->smallInteger('codice_treno')->unsigned();
            $table->tinyInteger('numero_carrozze')->unsigned()->nullable();
            $table->boolean('in_orario')->default(true);
            $table->boolean('cancellato')->default(false);
            $table->timestamp('partenza_odierna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
