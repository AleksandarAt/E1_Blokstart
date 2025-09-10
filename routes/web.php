<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes (met Breeze auth)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // ✅ rendert dashboard.blade.php, niet layouts.app
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Alles wat alleen ingelogde gebruikers mogen doen
Route::middleware(['auth'])->group(function () {

    // 📌 Docent-routes (vragen beheren)
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/questions/upload-csv', [QuestionController::class, 'uploadCsv'])->name('questions.uploadCsv');

    // 📌 Student-routes (quiz spelen)
    Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/result/{id}', [QuizController::class, 'result'])->name('quiz.result');
});

// 🔑 Breeze login/register routes
require __DIR__.'/auth.php';
