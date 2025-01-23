<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionUser extends Model
{
    use HasFactory;

    protected $table = 'question_user';

    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
        'created_at',
    ];
}
