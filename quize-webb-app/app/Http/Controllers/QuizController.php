<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\User;
use App\Models\QuestionUser;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function showQuizzes()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function showQuizQuestions($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions;
        return view('quizzes.show', compact('quiz', 'questions'));
    }

    public function submitQuiz(Request $request, $quizId)
    {
        $user = auth()->user();
        $quiz = Quiz::findOrFail($quizId);

        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|in:a,b,c'
        ]);
        foreach ($validated['answers'] as $questionId => $answer) {
            $question = Question::findOrFail($questionId);
            $correct = $question->correct_answer === $answer;
            QuestionUser::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'awnser' => $answer,
                    'correct' => $correct,
                ]
            );
        }

        $score = QuestionUser::where('user_id', $user->id)
                            ->where('correct', true)
                            ->count();

        return redirect()->route('quiz.results', ['quizId' => $quizId])->with('score', $score);
    }

    public function showResults($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $score = session('score', 0);
        $totalQuestions = $quiz->questions->count();

        return view('quizzes.results', compact('quiz', 'score', 'totalQuestions'));
    }
}
