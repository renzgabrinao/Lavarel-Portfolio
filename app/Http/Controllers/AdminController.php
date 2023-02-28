<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
  public function index()
  {
    $currentUser = auth()->user();

    return view('admin.index')
      ->with('projects', Project::all())
      ->with('categories', Category::all())
      ->with('tags', Tag::all())
      ->with('users', User::all())
      ->with('currentUser', $currentUser);
  }
}