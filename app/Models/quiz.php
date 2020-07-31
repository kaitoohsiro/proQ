<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $table = 'quizzes';
    protected $fillable = [
        'question', 'answer',
    ];
}
