<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProjectController::class, 'home']);
Route::get('/about', [ProjectController::class, 'about']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin/projects', [ProjectController::class, 'index']);
  Route::get('/admin/projects/{project}', [ProjectController::class, 'show']);
});

Route::fallback(function () {

  // Set a flash message
  session()->flash('error', 'Requested page not found.  Home you go.');

  // Redirect to /
  return redirect('/');
});