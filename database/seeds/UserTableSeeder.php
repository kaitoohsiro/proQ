<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            $user1 = [
                'name' => 'User1',
                'email' => 'User1@test.com',
                'password' => bcrypt('test')
            ],
            $user2 = [
                'name' => 'User2',
                'email' => 'User2@test.com',
                'password' => bcrypt('test')
            ],
            $user3 = [
                'name' => 'User3',
                'email' => 'User3@test.com',
                'password' => bcrypt('test')
            ],
        ];


        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
