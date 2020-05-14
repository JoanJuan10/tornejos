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
            $table->unsignedBigInteger("type_round_id");
            $table->foreign('type_round_id')->references('id')->on('type_rounds');
            $table->unsignedBigInteger("user_id_1");
            $table->foreign('user_id_1')->references('id')->on('participations');
            $table->unsignedBigInteger("user_id_2");
            $table->foreign('user_id_2')->references('id')->on('participations');
            $table->unsignedBigInteger("winner_id")->nullable();
            $table->foreign('winner_id')->references('id')->on('participations');
            $table->unsignedBigInteger("tournament_id");
            $table->foreign('tournament_id')->references('id')->on('tournaments');
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
