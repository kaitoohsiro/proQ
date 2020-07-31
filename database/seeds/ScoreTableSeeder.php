<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scores = [
            $score1 = [
                'user_id' => 3,
                'total_answer' => 11,
                'total_score' => 5
            ],
            $score2 = [
                'user_id' => 4,
                'total_answer' => 5,
                'total_score' => 3
            ],
            $score3 = [
                'user_id' => 5,
                'total_answer' => 9,
                'total_score' => 4
            ],
        ];



        foreach ($scores as $score) {
            DB::table('scores')->insert($score);
        }
    }
}
