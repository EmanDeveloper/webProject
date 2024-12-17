<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Add this line to import the User model
use Illuminate\Support\Facades\Hash;  // Import Hash facade
use Illuminate\Support\Facades\Auth;  // Import Auth facade


class UserController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user and hash the password
        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to the home page or another page
        return redirect()->route('home')->with('success', 'Welcome! You are now logged in.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle user login
    public function login(Request $request)
    {
        //dd($request->session()->all());
        // Validate the input data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to login the user
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('home')->with('success', 'You are logged in.');
        }
 
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    public function logout()
    {
        // Logout the user
        Auth::logout();

        // Redirect to the homepage or login page
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
