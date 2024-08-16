<?php

namespace App\Http\Controllers;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $allLineman = User::all();
        return view('auth.users', [
            'columns' => [
                'id' => 'ID',
                'name' => 'Fullname',
                'email' => 'Email',
                'role' => 'Role',
                'status' => 'Status',
                'fullinformation' => 'Full Information',
                'action' => 'Action',
            ],
            'allLineMan' => $allLineman,
        ]);
    }
}
