<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId("roundType");
            $table->foreign('roundType')->references('id')->on('type_rounds');
            $table->foreignId("player1");
            $table->foreign('player1')->references('id')->on('participations');
            $table->foreignId("player2");
            $table->foreign('player2')->references('id')->on('participations');
            $table->foreignId("winner")->nullable();
            $table->foreign('winner')->references('id')->on('participations');
            $table->foreignId("tournament");
            $table->foreign('tournament')->references('id')->on('tournaments');
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
        Schema::dropIfExists('rounds');
    }
}
