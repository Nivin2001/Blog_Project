<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

     // Handle the login submission
     public function login(Request $request)
     {
         // Validate the request data
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);

         // Attempt to log the user in
         if (Auth::attempt($request->only('email', 'password'))) {
             // Authentication passed, redirect to the dashboard
             return redirect()->route('dashboard');
         }

         // Authentication failed, redirect back with an error
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ])->withInput($request->only('email')); // Optional: repopulate the email field
     }

}
