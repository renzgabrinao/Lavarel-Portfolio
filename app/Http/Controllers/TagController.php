<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;


class TagController extends Controller
{
  public function create()
  {
    return view('admin.tags.create')
      ->with('tag', null);
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'unique:tags,name']
    ]);

    $attributes['slug'] = Str::slug($attributes['name']);
    Tag::create($attributes);

    session()->flash('success', 'Tag created successfully.');

    return redirect('/admin');
  }

  public function edit(Tag $tag)
  {
    return view('admin.tags.create')
      ->with('tag', $tag);

  }

  public function update(Tag $tag, Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'unique:tags,name,' . $tag->id]
    ]);

    $attributes['slug'] = Str::slug($attributes['name']);
    $tag->update($attributes);

    session()->flash('success', 'Tag updated successfully.');

    return redirect('/admin');
  }

  public function destroy(Tag $tag)
  {
    $tag->delete();

    // Set a flash message
    session()->flash('success', 'Tag Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');
  }
}