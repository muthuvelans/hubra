<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Capture the login credentials
        $credentials = $request->only('email', 'password');

        // Attempt to log in the user using the provided credentials
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect the user to the intended location based on their role
            return redirect()->intended('/home');
        }

        // If login attempt fails, return an error message
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
