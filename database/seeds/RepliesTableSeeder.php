<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
        	'user_id' => 1,
        	'discussion_id' => 1,
        	'content' => 'Dolore amet in culpa labore dolore sit proident do occaecat dolore irure deserunt amet veniam commodo reprehenderit ex esse.'
        ];

        $r2 = [
        	'user_id' => 1,
        	'discussion_id' => 2,
        	'content' => 'Incididunt labore incididunt adipisicing excepteur irure labore nisi magna minim sit quis reprehenderit et esse aute ullamco nostrud dolor quis duis voluptate consectetur in ea exercitation tempor nulla cupidatat in eiusmod ad elit in amet.'
        ];

        $r3 = [
        	'user_id' => 2,
        	'discussion_id' => 3,
        	'content' => 'Duis quis eu et consectetur proident mollit aliqua nulla ut fugiat occaecat sit ut ut non in aliqua fugiat mollit enim in consectetur sed cillum nisi nulla pariatur est ut in reprehenderit nostrud.'
        ];

        $r4 = [
        	'user_id' => 2,
        	'discussion_id' => 4,
        	'content' => 'Dolore sit exercitation culpa id excepteur ad incididunt adipisicing nostrud id dolor non nulla in labore laboris in amet.'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
