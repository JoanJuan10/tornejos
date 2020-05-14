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
            
            $table->unsignedBigInteger("user_id_1")->nullable();
            $table->foreign('user_id_1')->references('id')->on('participations');

            $table->unsignedBigInteger("user_id_2")->nullable();
            $table->foreign('user_id_2')->references('id')->on('participations');

            $table->integer("score1")->nullable();

            $table->integer("score2")->nullable();

            $table->unsignedBigInteger("tournament_id");
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            
            $table->string("roundtype");
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
