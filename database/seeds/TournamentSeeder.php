<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*

        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->date("dateoftournament");
            $table->text("rules");
            $table->text("prizes");
            $table->boolean("openregistration");
            $table->boolean("started");
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("game_id");
            $table->foreign('game_id')->references('id')->on('games');
            $table->timestamps();
        });
        */
        DB::table('tournaments')->insert([
            'name' => 'affafsafa',
            'description' => 'shfioa',
            'dateoftournament' => new DateTime(),
            'rules' => 'fsdjfioa',
            'prizes' => 'sdhfioad',
            'public' => 1,
            'openregistration' => true,
            'started' => false,
            'user_id' => 1,
            'game_id' => 1,
        ]);
    }
}
