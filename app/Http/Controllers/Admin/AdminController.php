<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quiz;

class AdminController extends Controller
{
    //
    public function index()
    {
        $quizzes = new quiz();
        $quizzes = $quizzes->get();
        return view('admin.home', compact('quizzes'));
    }

    public function quizNew()
    {
        return view('admin.new');
    }

    public function quizCreate(Request $request)
    {
        $quizzes = new quiz();
        $quizzes::insert([
            'question' => $request['question'],
            'answer' => $request['answer'],
        ]);
        return redirect('/admin/home');
    }


    public function quizEdit($id)
    {
        $quizzes = new quiz();
        $quizzes  = $quizzes::where('id', '=', $id)
            ->first();
        return view('admin.edit', compact('quizzes'));
    }

    public function quizUpdate(Request $request)
    {
        $quizzes = new quiz();
        $quizzes::where('id', '=', $request['id'])
            ->update([
                'question' => $request['question'],
                'answer' => $request['answer'],
            ]);
        return redirect('/admin/home');
    }

    public function quizDelete($id)
    {
        $quizzes = new quiz();
        $quizzes  = $quizzes::where('id', '=', $id)
            ->delete();
        return redirect('/admin/home');
    }
}
