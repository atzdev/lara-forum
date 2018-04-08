<?php

use Illuminate\Database\Seeder;
use App\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = [
        	'reply_id' => 1,
        	'user_id' =>1
        ];

        $l2 = [
        	'reply_id' => 1,
        	'user_id' => 2
        ];

        $l3 = [
        	'reply_id' => 1,
        	'user_id' => 3
        ];

        $l4 = [
        	'reply_id' => 2,
        	'user_id' => 2
        ];

        $l5 = [
        	'reply_id' => 2,
        	'user_id' => 3
        ];

        Like::create($l1);
        Like::create($l2);
        Like::create($l3);
        Like::create($l4);
        Like::create($l5);
    }
}
