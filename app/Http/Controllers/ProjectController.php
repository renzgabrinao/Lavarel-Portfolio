<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Tag;
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

  // GET create
  public function create()
  {
    return view('admin.projects.create')
      ->with('project', null)
      ->with('categories', Category::all())
      ->with('tags', Tag::all());
  }

  // POST create
  public function store(Request $request)
  {
    // ddd(request()->all());

    $attributes = $request->validate([
      'title' => ['required', 'unique:projects,title'],
      'excerpt' => 'required',
      'body' => 'required',
      'url' => ['nullable', 'sometimes', 'url'],
      'published_date' => ['nullable', 'sometimes', 'date'],
      'image' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048', 'dimensions:max_width=1200'],
      'thumb' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:1024', 'dimensions:max_width=600'],
      'category_id' => ['required', 'sometimes', 'exists:categories,id']
    ]);

    if ($request['image']) {
      $image_path = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
      $attributes['image'] = $image_path;
    }

    if ($request['thumb']) {
      $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
      $attributes['thumb'] = $thumb_path;
    }

    $attributes['slug'] = Str::slug($attributes['title']);

    Project::create($attributes);

    // after project is created, make an insert for the tags table if there are tags
    if ($request['tags']) {
      $project = Project::where('title', $request['title'])->first();
      $project->tags()->attach($request['tags']);
    }

    session()->flash('success', 'Project created successfully.');

    return redirect('/admin');
  }

  public function edit(Project $project)
  {
    return view('admin.projects.create')
      ->with('project', $project)
      ->with('categories', Category::all())
      ->with('tags', Tag::all());
  }

  public function update(Project $project, Request $request)
  {
    // ddd(request()->all());

    $attributes = request()->validate([
      'title' => ['required', 'unique:projects,title,' . $project->id],
      'excerpt' => 'required',
      'body' => 'required',
      'url' => ['nullable', 'sometimes', 'url'],
      'published_date' => ['nullable', 'sometimes', 'date'],
      'image' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048', 'dimensions:max_width=1200'],
      'thumb' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:1024', 'dimensions:max_width=600'],
      'category_id' => ['nullable', 'sometimes', 'exists:categories,id'],
    ]);

    if ($request['image']) {
      $image_path = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
      $attributes['image'] = $image_path;
    }
    if ($request['thumb']) {
      $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
      $attributes['thumb'] = $thumb_path;
    }


    $attributes['slug'] = Str::slug($attributes['title']);

    $project->update($attributes);

    if ($request['tags']) {
      $project = Project::where('title', $request['title'])->first();
      $project->tags()->attach($request['tags']);
    }

    session()->flash('success', 'Project updated successfully.');

    return redirect('/admin');
  }

  public function destroy(Project $project)
  {
    $project->delete();

    // Set a flash message
    session()->flash('success', 'Project Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');
  }

}