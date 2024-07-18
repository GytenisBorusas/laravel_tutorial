<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:3',
            ]
        );

        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        Mail::to($user->email)
        ->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {

        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password.",
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }
}
