<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
  public function create()
  {
    return view('admin.categories.create')
      ->with('category', null);
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'unique:categories,name']
    ]);

    $attributes['slug'] = Str::slug($attributes['name']);
    Category::create($attributes);

    session()->flash('success', 'Category created successfully.');

    return redirect('/admin');
  }

  public function edit(Category $category)
  {
    return view('admin.categories.create')
      ->with('category', $category);

  }

  public function update(Category $category, Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'unique:categories,name,' . $category->id]
    ]);

    $attributes['slug'] = Str::slug($attributes['name']);
    $category->update($attributes);

    session()->flash('success', 'Category updated successfully.');

    return redirect('/admin');
  }

  public function destroy(Category $category)
  {
    $category->delete();

    // Set a flash message
    session()->flash('success', 'Category Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');
  }

  public function getCategoriesJSON()
  {
    $categories = Category::all();
    return response()->json($categories);
  }
}