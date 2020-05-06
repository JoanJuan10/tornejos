<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->date("dateoftournament");
            $table->text("rules");
            $table->text("prizes");
            $table->boolean("openregistration");
            $table->boolean("started");
            $table->foreignId("creator");
            $table->foreign('creator')->references('id')->on('users');
            $table->foreignId("game");
            $table->foreign('game')->references('id')->on('games');
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
        Schema::dropIfExists('tournaments');
    }
}
