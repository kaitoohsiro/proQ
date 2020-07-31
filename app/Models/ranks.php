<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ranks extends Model
{
    protected $table = 'ranks';
    protected $fillable = [
        'user_id', 'total_rank', 'last_rank'
    ];
}
