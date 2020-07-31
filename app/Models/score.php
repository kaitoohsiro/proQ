<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'user_id', 'total_score', 'total_answer'
    ];
}
