<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteurLivreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteur_livre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auteur_id')
                ->constrained('auteurs')
                ->onDelete('cascade');
            $table->foreignId('livre_id')
                ->constrained('livres')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auteur_livre');
    }
}
