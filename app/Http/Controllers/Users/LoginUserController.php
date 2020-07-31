<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\score;
use App\Models\ranks;
use Illuminate\Http\Request;

// ログインしているユーザー用
class LoginUserController extends Controller
{
    // middlewareの処理
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ログインした時の
    public function userPage()
    {
        // userのマイページにデータを渡して表示
        $loginUser = Auth::user();
        $score = new score();
        $ranks = new ranks();
        $score = $score::where('user_id', '=', $loginUser['id'])
            ->first();
        $ranks = $ranks::where('user_id', '=', $loginUser['id'])
            ->first();
        $userInfo = [
            'id' => $loginUser['id'],
            'name' => $loginUser['name'],
            'totalRank' => $ranks['total_rank'],
            'lastRank' => $ranks['last_rank'],
            'totalAnswer' => $score['total_answer'],
            'totalScore' => $score['total_score'],
        ];

        return view('user.login.user', compact('userInfo'));
    }
}
