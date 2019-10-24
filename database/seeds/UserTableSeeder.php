<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('user')->insert([
                'name' => $faker->name,
                'birthday' => $faker->optional($weight = 0.9)->dateTimeBetween('-40 years', '-18 years'),
                'email' => $faker->unique()->email,
                'password' => '$2y$10$ZR7yEWAi36jMMfMpo3iS2.vqhDz.AvkhN7n0seu80aQ94cQL9mUTe', 
                'remember_token' => Str::random(10),
            ]);
        }
    }
}