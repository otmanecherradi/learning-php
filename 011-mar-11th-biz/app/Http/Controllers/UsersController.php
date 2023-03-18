<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function find()
  {
    return view('users.index', array('users' => User::all()));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('users.form', array('users' => null, 'edit' => false));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $u = new User();
    $u->name = $request->input('name');
    $u->email = $request->input('email');
    $u->email_verified_at = time();
    $u->password = Hash::make($u->email);
    $u->created_at = now();
    $u->save();

    return redirect('/users');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $user = User::find($id);
    return view('users.form', array('user' => $user, 'edit' => false));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::find($id);

    return view('users.form', array('user' => $user, 'edit' => true));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $u = User::find($id);
    $u->name = $request->input('name');
    $u->email = $request->input('email');
    $u->password = Hash::make($u->email);
    $u->updated_at = now();
    $u->save();
    return redirect('/users');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $u = User::find($id);
    $u->delete();

    return redirect('/users');
  }

}
