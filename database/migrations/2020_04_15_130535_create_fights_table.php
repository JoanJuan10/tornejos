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
            $table->integer("winner");
            $table->unsignedBigInteger("tournament_id");
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->unsignedBigInteger("round_id");
            $table->foreign('round_id')->references('id')->on('rounds');
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
