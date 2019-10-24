<?php

use Illuminate\Database\Seeder;
use App\Follow;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 1000;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('follow')->insert([
                'user_id' => mt_rand(1, 102),
                'follow_id' => mt_rand(1, 102)
            ]);
        }
    }
}

