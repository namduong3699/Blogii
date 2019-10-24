<?php

use Illuminate\Database\Seeder;
use App\Entry;

class EntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 500;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('entry')->insert([
            	'user_id' => mt_rand(1, 100),
            	'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            	'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias quod, aperiam. Unde rem aperiam sed ratione quibusdam magnam odio, at, tempore minima reiciendis inventore earum itaque dolores nostrum explicabo consectetur vero eaque atque alias. Sequi illum libero ea at eligendi placeat tempora quisquam nesciunt, quaerat optio exercitationem, in dolorum ipsum molestiae laudantium enim alias modi minima possimus consectetur, eos quo.',
            	'view' => 0 
            ]);
        }
    }
}