<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// returns the home page with all tasks of a specific team
Route::get('/teams/{team}/tasks', [TaskController::class ,'index'])->name('tasks.index');
// returns the form for adding a task
Route::get('/tasks/create', [TaskController::class . 'create'])->name('tasks.create');
// adds a task to the database
Route::post('/tasks', [TaskController::class .'store'])->name('tasks.store');
// returns a page that shows a full task
Route::get('/tasks/{task}', [TaskController::class .'show'])->name('tasks.show');
// returns the form for editing a post
Route::get('/tasks/{task}/edit', [TaskController::class .'edit'])->name('posts.edit');
// updates a post
Route::put('/posts/{post}', [TaskController::class .'update'])->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', [TaskController::class .'destroy'])->name('posts.destroy');
