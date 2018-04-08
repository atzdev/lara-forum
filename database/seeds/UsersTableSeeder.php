<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@udemy-forum.dev',
            'avatar' => 'avatars/avatar01.png',
            'admin' => 1
        ]);

        App\User::create([
            'name' => 'Emily Myers',
            'password' => bcrypt('password'), 
            'email' => 'emily@myers.com',
            'avatar' => 'avatars/avatar02.png'
        ]);

        App\User::create([
            'name' => 'Bruce Wayne',
            'password' => bcrypt('password'),
            'email' => 'brucewayn@gmail.com',
            'avatar' => 'avatars/avatar03.png'
        ]);
    }
}
