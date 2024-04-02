<?php

use App\Http\Controllers\ApprovementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TaskController;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use App\Http\Controllers\LogController;
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
use App\Http\Controllers\UserController;
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

<<<<<<< HEAD
Route::get('/', function () {
    return view('login');
});
=======
<<<<<<< HEAD

=======
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('proses_login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

<<<<<<< HEAD
Route::get('/dashboard', function () {return view('index');})->name('dashboard')->middleware('auth');
=======
<<<<<<< HEAD
Route::get('/dashboard', function () {return view('index');})->name('dashboard')->middleware('auth');
=======
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index')->middleware('auth');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
<<<<<<< HEAD
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
=======
<<<<<<< HEAD
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
=======
// Route::get('/tasks/{task_id}', [LogController::class, 'log'])->name('tasks.log');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
Route::post('/tasks/{task_id}/approvement', [ApprovementController::class, 'approvement'])->name('tasks.approvement');
Route::post('/notifications', [NotificationController::class, 'index'])->name('notifications.index')->middleware('auth');


Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{users}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{users}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
});


