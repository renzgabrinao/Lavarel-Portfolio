<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
  public function create()
  {
    return view('register_user.create')
      ->with('admin', false);
  }

  public function store()
  {
    $attributes = request()->validate([
      'name' => 'required',
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $user = User::create($attributes);

    auth()->login($user);

    return redirect('/');
  }

  public function adminCreate()
  {
    return view('register_user.create')
      ->with('admin', true)
      ->with('user', null);
  }

  public function adminStore()
  {
    $attributes = request()->validate([
      'name' => 'required',
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'min:8', 'confirmed'],
    ]);

    User::create($attributes);

    return redirect('/admin');
  }

  public function adminEdit(User $user)
  {
    return view('register_user.create')
      ->with('user', $user)
      ->with('admin', true);
  }

  public function adminUpdate(User $user, Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'unique:users,email']
    ]);

    $user->update($attributes);

    session()->flash('success', 'User updated successfully.');

    return redirect('/admin');
  }

  public function destroy(User $user)
  {
    $user->delete();

    // Set a flash message
    session()->flash('success', 'User Deleted Successfully');

    // Redirect to the Admin Dashboard
    return redirect('/admin');
  }

}