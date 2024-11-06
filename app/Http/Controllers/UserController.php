<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = DB::table('users')->get();
        return view('Blog.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Blog.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => null,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10), // Corrected to use Str::random
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
            // Convert created_at to Carbon instance
    $user->created_at = Carbon::parse($user->created_at);

        return view('Blog.admin.user.show', compact('user'));
    }

  // Show the form for editing the specified user
  public function edit($id)
  {
      $user = DB::table('users')->where('id', $id)->first();

      if (!$user) {
          return redirect()->route('users.index')->with('error', 'User not found.');
      }

      return view('Blog.admin.user.edit', compact('user'));
  }

       // Update the specified user in the database
       public function update(Request $request, $id)
       {
            // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
    ]);
           DB::table('users')->where('id', $id)->update([
               'name' => $request->name,
               'email' => $request->email,
               'password' => $request->password ? bcrypt($request->password) : DB::raw('password'), // Only update password if provided
               'updated_at' => now(),
           ]);

           return redirect()->route('users.index')
           ->with('success', 'User updated successfully.');
       }

       public function destroy($id)
       {
           DB::table('users')->where('id', $id)->delete();

           return redirect()->route('users.index')
           ->with('success', 'User deleted successfully.');
       }
}

