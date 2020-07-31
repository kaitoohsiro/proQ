<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes = [
            $quiz1 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz2 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz3 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz4 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz5 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz6 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz7 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz8 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
            $quiz9 = [
                'question' => '数列2, 0, 5, 7, 12....(第1~5...項)で与えられるトリボナッチがある。第48項の値を答えよ。',
                'answer' => 'test',
            ],
        ];

        foreach ($quizzes as $quiz) {
            DB::table('quizzes')->insert($quiz);
        }
    }
}
