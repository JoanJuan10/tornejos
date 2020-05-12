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
            $table->unsignedBigInteger("tournament");
            $table->foreign('tournament')->references('id')->on('tournaments');
            $table->unsignedBigInteger("round");
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
