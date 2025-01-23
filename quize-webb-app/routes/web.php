<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/quizzes', [QuizController::class, 'showQuizzes'])->name('quizzes.index');
    Route::get('/quiz/{quizId}', [QuizController::class, 'showQuizQuestions'])->name('quiz.show');
    Route::post('/quiz/{quizId}/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/quiz/{quizId}/results', [QuizController::class, 'showResults'])->name('quiz.results');

});

Route::middleware(['auth', 'is_teacher'])->group(function () {
    Route::get('/admin/quiz', [AdminController::class, 'showQuizPage'])->name('admin.quiz');
    Route::post('/admin/quiz/upload', [AdminController::class, 'uploadQuiz'])->name('admin.quiz.upload');
    Route::get('/admin/answers', [AdminController::class, 'viewStudentAnswers'])->name('admin.answers');
});


require __DIR__.'/auth.php';
