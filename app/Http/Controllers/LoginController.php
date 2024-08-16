<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'email'=>'required|email:users',
            'password'=>'required|min:8'
        ]);
        // SELECT * FROM users WHERE email = '$request->email';
        $user = User::where('email','=',$request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('authId', $user->id);
                // $_SESSION['authId'] = $user->id;
                return redirect('dashboard');
            } else {
                return back()->with('fail','Password not match!');
            }
        } else {
            return back()->with('fail','This email is not register.');
        }
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        $request->session()->forget('authId');
        return redirect('/');
    }
}

