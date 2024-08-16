<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

        // SELECT * FROM users WHERE email = '$request->email';
        // $user = User::where('email','=',$request->email)->first();
        // if ($user) {
        //     if (Hash::check($request->password, $user->password)) {
        //         $request->session()->put('authId', $user->id);
        //         return redirect('dashboard');
        //     } else {
        //         return back()->with('fail','Password not match!');
        //     }
        // } else {
        //     return back()->with('fail','This email is not register.');
        // }
    // }

    // Handle the logout request
    // public function logout(Request $request)
    // {
    //     $request->session()->forget('authId');
    //     return redirect('/');
    // }
}

