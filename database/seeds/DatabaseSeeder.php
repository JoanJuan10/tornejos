<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GameSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TournamentSeeder::class);
        
    }
}
