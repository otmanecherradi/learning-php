<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function login()
  {
    return view('auth.login');
  }


  public function authenticate(Request $request): RedirectResponse
  {
    $credentials = $request->validate([
      'email' => 'required|string|email|max:255',
      'password' => 'required|string',
    ]);

    if (
      Auth::attemptWhen($credentials, function (User $user) {
        return $user->is_admin;
      })
    ) {
      $request->session()->regenerate();

      return redirect('/dashboard');
    }

    return back()->withErrors([
      'error' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request): RedirectResponse
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
