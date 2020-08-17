<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\score;
use App\Models\ranks;
use App\Models\quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// User用(誰でも)のコントローラー
class UsersController extends Controller
{

    /**
     * どのユーザーでもみれるスタートページ
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        logger($user);
        logger("kkk");
        if ($user) {
            logger($user);
            return view('user/index', compact('user'));
        } else {
            logger($user);
            return view('user/index', compact('user'));
        }
    }

    public function rankShow()
    {
        // ランキングテーブル参照してランキング情報を取得
        $users = new User();
        $scores = new score();
        $ranks = new ranks();
        $scores = $scores::orderBy('total_score', 'desc')
            ->get();
        $userRankInfo = [];
        foreach ($scores as $score) {
            $user = $users::where('id', '=', $score['user_id'])
                ->first();
            $rank = $ranks::where('user_id', '=', $score['user_id'])
                ->first();


            array_push($userRankInfo, [
                'userId' => $user['id'],
                'totalRank' => $rank['total_rank'],
                'userName' => $user['name'],
                'totalScore' => $score['total_score']
            ]);
        }

        // ランキングページにランキング情報を渡す。

        return view('user.rank', compact('userRankInfo'));
    }

    public function quizSelect()
    {
        return view('user.quiz.select');
    }

    public function quiz(Request $request)
    {
        $key = $request['number'];
        $quizzes = new quiz();
        if ($key) {
            $quizzes = $quizzes->inRandomOrder()
                ->take($key)
                ->get();
        } else {
            $quizzes = $quizzes->inRandomOrder()
                ->take(3)
                ->get();
        }

        return view('user.quiz.quiz', compact('quizzes'));
    }

    public function quizFinish(Request $request)
    {
        $resultScore = 0;
        $totalAnswer = 0;
        $info = array();
        array_push(
            $info,
            [
                "resultScore" => $resultScore,
                "totalAnswer" => $totalAnswer,
            ]
        );

        for ($i = 0; $i <= $request['count']; $i++) {
            $quiz = 'quiz' . $i;
            $answer = 'answer' . $i;
            $current = 'current' . $i;
            if ($request[$current] == $request[$answer]) {
                $judgment = 1;
                $resultScore++;
                $totalAnswer++;
            } else {
                $judgment = 2;
                $totalAnswer++;
            }
            array_push(
                $info,
                [
                    "quiz" => $request[$quiz],
                    "answer" => $request[$answer],
                    "current" => $request[$current],
                    "judgment" => $judgment,
                ]
            );
        }
        $info[0]["resultScore"] = $resultScore;
        $info[0]["totalAnswer"] = $totalAnswer;
        return view('user.quiz.result', compact("info"));
    }
}
