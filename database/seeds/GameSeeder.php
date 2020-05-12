<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Grand Theft Auto V',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/Grand%20Theft%20Auto%20V-285x380.jpg',
        ]);
        Game::create([
            'name' => 'VALORANT',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/VALORANT-285x380.jpg',
        ]);
        Game::create([
            'name' => 'Fortnite',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/Fortnite-285x380.jpg',
        ]);
        Game::create([
            'name' => 'Counter Strike: Global Offensive',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/./Counter-Strike:%20Global%20Offensive-285x380.jpg',
        ]);
        Game::create([
            'name' => 'Call of Duty: Warzone',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/./Call%20of%20Duty:%20Modern%20Warfare-285x380.jpg',
        ]);
        Game::create([
            'name' => 'League of Legends',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-285x380.jpg',
        ]);
        Game::create([
            'name' => 'Rocket League',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/Rocket%20League-285x380.jpg',
        ]);
        Game::create([
            'name' => 'FIFA 20',
            'img_link' => 'https://static-cdn.jtvnw.net/ttv-boxart/FIFA%2020-285x380.jpg',
        ]);
        Game::create([
            'name' => 'Farm Simulator 2019',
        ]);
        Game::create([
            'name' => 'Undercards',
        ]);
    }
}
