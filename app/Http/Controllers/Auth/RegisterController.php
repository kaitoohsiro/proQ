<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use app\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ranks;
use App\Models\score;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $score = new score();
        $ranks = new ranks();
        $user = User::where('email', '=', $data['email'])
            ->first();
        $registerScore = $score::create([
            'user_id' => $user['id'],
            'total_score' => 0,
            'last_score' => 0,
        ]);
        $maxRank = $ranks::max("total_rank");
        $maxRankCount = $ranks::where('total_rank', '=', $maxRank)
            ->count();
        $maxRankUser = $ranks::where('total_rank', '=', $maxRank)
            ->first();

        $lastUser = $score::where('user_id', '=', $maxRankUser['user_id'])
            ->first();

        if (!$maxRank) {
            $ranks::create([
                'user_id' => $user['id'],
                'total_rank' => 1,
                'last_rank' => 1,
            ]);
        } else if ($lastUser['total_score'] == $registerScore['total_score']) {
            $ranks::create([
                'user_id' => $user['id'],
                'total_rank' => $maxRankUser['total_rank'],
                'last_rank' => $maxRankUser['total_rank'],
            ]);
        } else {
            $ranks::create([
                'user_id' => $user['id'],
                'total_rank' => $maxRankUser['total_rank'] + $maxRankCount,
                'last_rank' => $maxRankUser['total_rank'] + $maxRankCount,
            ]);
        }

        return $user;
    }
}
