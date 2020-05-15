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
            $table->datetime("dateoftournament");
            $table->text("rules");
            $table->text("prizes");
            $table->boolean("openregistration")->default(0);
            $table->boolean("started")->default(0);
            $table->boolean("public")->default(0);
            $table->boolean("thirdplace")->default(1);
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("game_id");
            $table->foreign('game_id')->references('id')->on('games');
            $table->timestamps();
        });
        /*Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users');
        });*/
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
