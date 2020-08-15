<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\score;
use App\Models\ranks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function rankUpdate(Request $request)
    {
        $userInfos = DB::transaction(function () use ($request) {
            $rank = new ranks();
            $score = new score();
            $loginUser = Auth::user();
            $userRankInfo = $rank::where("user_id", "=", $loginUser->id)
                ->first();
            $userScoreInfo = $score::where("user_id", "=", $loginUser->id)
                ->first();
            // 更新前のランキング
            $pastRank = $userRankInfo["total_rank"];
            // 更新前のスコア
            $pastScore = $userScoreInfo["total_score"];
            // 更新前の解いた問題数
            $pastAnswer = $userScoreInfo["total_answer"];

            // 更新後のスコア
            $updateScore = $pastScore + $request["resultScore"];
            // 更新後の解いた問題数
            $updateAnswer = $pastAnswer + $request["totalAnswer"];

            // ランキングとスコア処理　
            if ($pastRank == 1) { // 更新前のランキングがトップの時
                // ランキング変動なし　スコア処理のみ
                $score::where("user_id", "=", $loginUser->id)
                    ->update([
                        "total_score" => $updateScore,
                        "total_answer" => $updateAnswer,
                    ]);
                $rankOne = $rank::where('total_rank', '=', 1)
                    ->where("user_id", "!=", $loginUser->id)
                    ->get();
                if ($rankOne) {
                    for ($i = 0; $i <= count($rankOne) - 1; $i++) {
                        $rank::where('user_id', '=', $rankOne[$i]["user_id"])
                            ->update([
                                "total_rank" => $rankOne[$i]["total_rank"] + 1,
                            ]);
                    }
                }
            } else { // 更新前のランキングがトップでない
                // スコア更新前後の間に挟まれているユーザを取得
                $moveScore = $score::where('user_id', "!=", $loginUser['id'])
                    ->whereBetween('total_score', [$pastScore, $updateScore - 1])
                    ->get();
                // 更新後のスコアと同じスコアのユーザを1データ取得
                $upperUserScore = $score::where('total_score', "=", $updateScore)
                    ->first();
                // 更新後のスコアと同じユーザがいる時
                if ($upperUserScore) {
                    // 更新後のユーザのランクを取得
                    $upperUserRank = $rank::where('user_id', "=", $upperUserScore['user_id'])
                        ->first();
                    // スコアの更新
                    $score::where("user_id", "=", $loginUser->id)
                        ->update([
                            "total_score" => $updateScore,
                            "total_answer" => $updateAnswer,
                        ]);
                    // ランクの更新
                    $rank::where("user_id", "=", $loginUser->id)
                        ->update([
                            "total_rank" => $upperUserRank["total_rank"],
                        ]);


                    // スコア更新により他ユーザへの変動処理
                    if ($moveScore) { // 更新前と更新後のスコアの間に他のユーザがいる時
                        for ($i = 0; $i <= count($moveScore) - 1; $i++) {
                            $moveRank = $rank::where("user_id", "=", $moveScore[$i]["user_id"])
                                ->first();
                            $updateRank = [
                                "user_id" => $moveRank["user_id"],
                                "total_rank" => $moveRank["total_rank"] + 1,
                            ];
                            $rank::where("user_id", "=", $updateRank["user_id"])
                                ->update([
                                    "total_rank" => $updateRank["total_rank"]
                                ]);
                        }
                    }
                } else { // 更新後のスコアに同じユーザがいない時
                    // 更新後のスコアより大きいスコアを持つユーザの中で最小のスコアを取得
                    $nextUserScore = $score::where("total_score", ">", $updateScore)
                        ->orderby('total_score', "asc")
                        ->first();

                    if ($nextUserScore) { // スコア更新でまだ上にスコアの高い他ユーザがいる時
                        // 他ユーザのランキングを取得
                        $nextUserRank = $rank::where('user_id', "=", $nextUserScore['user_id'])
                            ->first();
                        $nextRankCount = $rank::where('total_rank', "=", $nextUserRank['total_rank'])
                            ->count();
                        // スコアの更新
                        $score::where("user_id", "=", $loginUser->id)
                            ->update([
                                "total_score" => $updateScore,
                                "total_answer" => $updateAnswer,
                            ]);
                        // ランキングの更新
                        $rank::where("user_id", "=", $loginUser->id)
                            ->update([
                                "total_rank" => $nextUserRank["total_rank"] + $nextRankCount,
                            ]);
                        // スコア更新により他ユーザへの変動処理
                        if ($moveScore) { // 更新前と更新後のスコアの間に他のユーザがいる時
                            for ($i = 0; $i <= count($moveScore) - 1; $i++) {
                                $moveRank = $rank::where("user_id", "=", $moveScore[$i]["user_id"])
                                    ->first();
                                $updateRank = [
                                    "user_id" => $moveRank["user_id"],
                                    "total_rank" => $moveRank["total_rank"] + 1,
                                ];
                                $rank::where("user_id", "=", $updateRank["user_id"])
                                    ->update([
                                        "total_rank" => $updateRank["total_rank"]
                                    ]);
                            }
                        }
                    } else { // ランキングが1位になる時
                        // 更新後2位になる他ユーザのスコアデータを取得
                        $nextUserScore = $score::where("total_score", "<", $updateScore)
                            ->orderby('total_score', "desc")
                            ->first();

                        if ($nextUserScore) { // 2位のデータがある時
                            // 2位のランキングデータを取得
                            $nextUserRank = $rank::where('user_id', "=", $nextUserScore['user_id'])
                                ->first();
                            // スコアの更新
                            $score::where("user_id", "=", $loginUser->id)
                                ->update([
                                    "total_score" => $updateScore,
                                    "total_answer" => $updateAnswer,
                                ]);
                            // ランキングの更新
                            $rank::where("user_id", "=", $loginUser->id)
                                ->update([
                                    "total_rank" => $nextUserRank["total_rank"],
                                ]);
                            // 更新前と更新後のスコアの間に他のユーザがいる時
                            if ($moveScore) {
                                for ($i = 0; $i <= count($moveScore) - 1; $i++) {
                                    $moveRank = $rank::where("user_id", "=", $moveScore[$i]["user_id"])
                                        ->first();
                                    $updateRank = [
                                        "user_id" => $moveRank["user_id"],
                                        "total_rank" => $moveRank["total_rank"] + 1,
                                    ];
                                    $rank::where("user_id", "=", $updateRank["user_id"])
                                        ->update([
                                            "total_rank" => $updateRank["total_rank"]
                                        ]);
                                }
                            }
                        }
                    }
                }
            }
            $loginUserRank = $rank::where('user_id', '=', $loginUser->id)
                ->first();
            $loginUserScore = $score::where('user_id', '=', $loginUser->id)
                ->first();
            $userInfos = array();
            $userInfos = [
                "updateRank" => $pastRank,
                "updateScore" => $pastScore,
                "updatedRank" => $loginUserRank['total_rank'],
                "updatedScore" => $loginUserScore['total_score'],
            ];

            return $userInfos;
        });

        return view('user.login.userQuiz', compact('userInfos'));
    }
}
