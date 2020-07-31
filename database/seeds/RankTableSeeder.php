<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ranks = [
            $rank1 = [
                'user_id' => 3,
                'total_rank' => 2,
                'last_rank' => 2
            ],
            $rank2 = [
                'user_id' => 4,
                'total_rank' => 4,
                'last_rank' => 4
            ],
            $rank3 = [
                'user_id' => 5,
                'total_rank' => 3,
                'last_rank' => 3
            ],
        ];

        foreach ($ranks as $rank) {
            DB::table('ranks')->insert($rank);
        }
    }
}
