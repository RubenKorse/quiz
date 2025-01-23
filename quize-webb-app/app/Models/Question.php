<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'correct_answer',
        'answer_a',
        'answer_b',
        'answer_c',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'question_user')
                    ->withPivot('answer', 'created_at');
    }

    public function isOpenQuestion()
    {
        return is_null($this->answer_a) && is_null($this->answer_b) && is_null($this->answer_c);
    }
}
