<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteurs', function (Blueprint $table) {
            $table->id();
            $table->text('biographie')->nullable();
            $table->string('titre')->nullable();
            $table->text('institution')->nullable();
            $table->text('fonction')->nullable();
            $table->string('pays')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->boolean('status');
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
        Schema::dropIfExists('auteurs');
    }
}
