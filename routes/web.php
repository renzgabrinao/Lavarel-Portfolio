<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');



Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'index']);

  // create and store project
  Route::get('/admin/project/create', [ProjectController::class, 'create']);
  Route::post('/admin/project/create', [ProjectController::class, 'store']);
  // edit and update project
  Route::get('/admin/project/{project:slug}/edit', [ProjectController::class, 'edit']);
  Route::patch('/admin/project/{project:slug}/edit', [ProjectController::class, 'update']);
  // delete project
  Route::delete('/admin/projects/{project:slug}/delete', [ProjectController::class, 'destroy']);

  // create and store category
  Route::get('/admin/category/create', [CategoryController::class, 'create']);
  Route::post('/admin/category/create', [CategoryController::class, 'store']);
  // edit and update category
  Route::get('/admin/category/{category:slug}/edit', [CategoryController::class, 'edit']);
  Route::patch('/admin/category/{category:slug}/edit', [CategoryController::class, 'update']);
  // delete category
  Route::delete('/admin/category/{category:slug}/delete', [CategoryController::class, 'destroy']);

  // create and store tag
  Route::get('/admin/tag/create', [TagController::class, 'create']);
  Route::post('/admin/tag/create', [TagController::class, 'store']);
  //edit and update tag
  Route::get('/admin/tag/{tag:slug}/edit', [TagController::class, 'edit']);
  Route::patch('/admin/tag/{tag:slug}/edit', [TagController::class, 'update']);
  //delete tag
  Route::delete('/admin/tag/{tag:slug}/delete', [TagController::class, 'destroy']);

  // create and store user
  Route::get('/admin/user/create', [RegisterUserController::class, 'adminCreate']);
  Route::post('/admin/user/create', [RegisterUserController::class, 'adminStore']);
  //edit and update user
  Route::get('/admin/user/{user:name}/edit', [RegisterUserController::class, 'adminEdit']);
  Route::patch('/admin/user/{user:name}/edit', [RegisterUserController::class, 'adminUpdate']);
  //delete user
  Route::delete('/admin/user/{user:name}/delete', [RegisterUserController::class, 'destroy']);

});

Route::fallback(function () {

  // Set a flash message
  session()->flash('error', 'Requested page not found.  Home you go.');

  // Redirect to /
  return redirect('/');
});