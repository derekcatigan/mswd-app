<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::select('name', 'email', 'role')->get();
        return view('Auth.account', compact(['accounts']));
    }
}
