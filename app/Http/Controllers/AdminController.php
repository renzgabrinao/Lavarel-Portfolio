<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index')
      ->with('projects', Project::all())
      ->with('users', User::all());
  }

  public function editProject(Project $project)
  {

  }

  public function deleteProject(Project $project)
  {

  }
  public function editUser(User $user)
  {

  }

  public function deleteUser(User $user)
  {

  }
}