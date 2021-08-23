<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowUsers extends Controller
{
    public function index()
    {
        return view('users',['users' => User::all()]);
    }
}
