<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Users\UsersController@index');
Route::get('/rank', 'Users\UsersController@rankShow');
Route::get('/select', 'Users\UsersController@quizSelect');
Route::get('/quiz', 'Users\UsersController@quiz');

// 管理者用の認証
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false
    ]);

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', 'AdminController@index');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('new', 'AdminController@quizNew');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::post('quizCreate', 'AdminController@quizCreate')->name('quizCreate');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('/edit/{id?}', 'AdminController@quizEdit');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::post('update', 'AdminController@quizUpdate')->name('quizUpdate');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('/delete/{id?}', 'AdminController@quizDelete')->name('quizDelete');
    });
});

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
]);
// ユーザー用認証
Route::middleware('auth:user')->group(function () {
    Route::get('/home', 'Users\LoginUserController@userPage')->name('home');
    Route::post('/quiz/result', 'Users\LoginUserController@rankUpdate')->name('rankUpdate');
    Route::get('/', 'Users\UsersController@index')->name('top');
    Route::get('/rank', 'Users\UsersController@rankShow')->name('rank');
    Route::get('/select', 'Users\UsersController@quizSelect');
    Route::get('/quiz', 'Users\UsersController@quiz');
    Route::post('/quiz/finish', 'Users\UsersController@quizFinish')->name('quizFinish');
});
