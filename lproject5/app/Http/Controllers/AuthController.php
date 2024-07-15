<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Ensure you import the Session facade

class AuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function registration() {
        return view('auth.registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('welcome'));
        }
        return redirect()->route('auth.login')->with('error', 'Login details not valid');
    }

    function registrationPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect()->route('auth.registration')->with('error', 'Registration failed');
        }
        return redirect()->route('auth.login')->with('success', 'Registration success');
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
