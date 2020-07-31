<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        if (Auth::user()) {
            $user = Auth::user();
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
}
