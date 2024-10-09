<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//
//Lab 2 - Task 1
//
Route::get ('/hello-world', function () {
    return 'Hello World';
});

Route::get('/capture-uri' , function () {
    return request()->path();
});

Route::get('/return-variables', function () {
    $first_var = 'FIRST_VAR';
    $second_var = 'SECOND_VAR';
    return "First Variable is: $first_var ::: Second Variable is: $second_var";
});
//--------------------

//
//Lab 2 - Task 2
Route::get('/task2-1', function ()  {
    return view('task2-1');
});

Route::get('/task2-2', function () {
    $uri = request()->path();
    return view('task2-2', ['uri' => $uri]);
});

Route::get('/task2-3/{first_var}', function ($first_var) {
    return view('task2-3', ['first_var' => $first_var);

});

//



//--------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
