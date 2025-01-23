<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;

class AdminController extends Controller
{
    public function showQuizPage()
    {
        return view('admin.quiz');
    }

    public function uploadQuiz(Request $request)
    {
        $request->validate([
            'quiz_file' => 'required|mimes:csv,txt|max:2048',
            'name' => 'required',
        ]);

        $quiz = Quiz::create([
            'name' => $request->name,
        ]);

        $quizId = $quiz->id;

        $file = $request->file('quiz_file');
        $filePath = $file->getRealPath();

        $data = array_map(function ($line) {
            return str_getcsv($line, ';');
        }, file($filePath));

        $header = array_map('strtolower', $data[0]);
        unset($data[0]);
        $expectedHeaders = ['id', 'question', 'answer_a', 'answer_b', 'answer_c', 'correct_answer'];

        if ($header !== $expectedHeaders) {
            return back()->withErrors(['quiz_file' => 'The CSV file must have valid headers: id, question, answer_a, answer_b, answer_c, correct_answer']);
        }

        foreach ($data as $row) {
            $rowData = array_combine($header, $row);

            Question::create([
                'quiz_id' => $quizId,
                'question' => $rowData['question'],
                'answer_a' => $rowData['answer_a'] ?: null,
                'answer_b' => $rowData['answer_b'] ?: null,
                'answer_c' => $rowData['answer_c'] ?: null,
                'correct_answer' => $rowData['correct_answer'],
            ]);
        }

        return redirect()->back()->with('success', 'Quiz uploaded successfully!');
    }
}
