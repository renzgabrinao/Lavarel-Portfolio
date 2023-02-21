<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{

  public function home()
  {
    return view("projects.home");
  }

  public function about()
  {
    return view("projects.about");
  }

  public function index()
  {
    return view('projects.index')
      ->with('projects', Project::all())
      ->with('category', null);
  }

  public function show(Project $project)
  {
    return view('projects.project', ['project' => $project]);
  }
  public function listByCategory(Category $category)
  {
    return view('projects.index')
      ->with('projects', $category->projects)
      ->with('category', $category['name']);
  }
}