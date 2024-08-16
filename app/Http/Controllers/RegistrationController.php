<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;

class RegistrationController extends Controller
{
    public function index()
    {
        return view("auth.registration");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email:users',
            'password'=>'required|min:8',
            'role' => 'required|in:admin,lineman',
            'status' => 'required|in:active,inactive',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = $request->status;

        try {
            $result = $user->save();

            if ($result) {
                return back()->with('success','You have registered successfully.');
            } else {
                return back()->with('fail','Something wrong!');
            }
        } catch (UniqueConstraintViolationException $e) {
            return back()->withErrors(['error' => 'Email address already exists']);
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
