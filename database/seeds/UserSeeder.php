<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        $faker = Faker\Factory::create('es_ES');
        
        
        for ($i = 0; $i < 32; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('password'),
            ]);
        }
        
    }
}
