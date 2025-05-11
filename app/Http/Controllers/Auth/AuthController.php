<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $redirectTo = match ($user->role) {
                'admin' => route('dashboard.admin'),
                'employee' => route('dashboard.employee'),
                default => abort(403, 'Unauthorized access.'),
            };

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful!',
                'redirect_to' => $redirectTo
            ]);
        }


        return response()->json([
            'status' => 'error',
            'message' => 'The provided credentials do not match our records.'
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
