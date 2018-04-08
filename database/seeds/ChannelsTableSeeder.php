<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'JSON', 'slug' => str_slug('JSON') ];
        $channel2 = ['title' => 'JAVA', 'slug' => str_slug('JAVA') ];
        $channel3 = ['title' => 'Javascript', 'slug' => str_slug('Javascript') ];
        $channel4 = ['title' => 'PHP Testing', 'slug' => str_slug('PHP Testing') ];
        $channel5 = ['title' => 'Spark', 'slug' => str_slug('Spark') ];
        $channel6 = ['title' => 'Lumen', 'slug' => str_slug('Lumen') ];
        $channel7 = ['title' => 'Forge', 'slug' => str_slug('Forge') ];
        $channel8 = ['title' => 'VueJS', 'slug' => str_slug('VueJS') ];

        channel::create($channel1);
        channel::create($channel2);
        channel::create($channel3);
        channel::create($channel4);
        channel::create($channel5);
        channel::create($channel6);
        channel::create($channel7);
        channel::create($channel8);
    }
}
