<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->id();
            $table->foreignId("player1");
            $table->foreign('player1')->references('id')->on('users');
            $table->foreignId("player2");
            $table->foreign('player2')->references('id')->on('users');
            $table->foreignId("winner");
            $table->foreign('winner')->references('id')->on('users');
            $table->foreignId("tournament");
            $table->foreign('tournament')->references('id')->on('tournaments');
            $table->foreignId("round");
            $table->foreign('round')->references('id')->on('rounds');
            $table->string("fightNum");
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
        Schema::dropIfExists('fights');
    }
}
