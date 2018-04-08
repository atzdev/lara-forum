<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs not working correctly';
        $t3 = 'Vuejs event listeners for child compnents';
        $t4 = 'Laravel homestead error - undetected database';

        $d1 = [
        	'title' => $t1,
        	'content' => 'Tempor aute incididunt tempor sunt exercitation minim voluptate eu in esse qui eu duis exercitation sit sit mollit occaecat mollit in cillum eu id mollit.',
        	'channel_id' => 1,
        	'user_id' => 2,
        	'slug' => str_slug($t1)
        ];


        $d2 = [
        	'title' => $t2,
        	'content' => 'Dolor incididunt sit aliquip commodo consequat cupidatat nulla ut enim adipisicing esse anim in duis voluptate sunt ea elit dolor occaecat dolor anim in ad amet reprehenderit labore et proident consequat voluptate culpa adipisicing reprehenderit.',
        	'channel_id' => 2,
        	'user_id' => 3,
        	'slug' => str_slug($t2)
        ];

        $d3 = [
        	'title' => $t3,
        	'content' => 'Commodo enim laborum ullamco aute amet cupidatat adipisicing cillum est dolor consectetur mollit ut do adipisicing nisi proident do labore esse ad incididunt aliqua dolor pariatur officia.',
        	'channel_id' => 2,
        	'user_id' => 1,
        	'slug' => str_slug($t3)
        ];

        $d4 = [
        	'title' => $t4,
        	'content' => 'Fugiat est amet exercitation labore cupidatat in eiusmod nulla eiusmod culpa consectetur ullamco qui fugiat labore cupidatat enim in dolore adipisicing deserunt non anim.',
        	'channel_id' => 5,
        	'user_id' => 3,
        	'slug' => str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
