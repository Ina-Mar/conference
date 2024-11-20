<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login() :View
    {
        return view('auth.login');
    }
    public function authenticate(Request $request) :RedirectResponse
    {
        $validated = $request->validate(['email' => 'required', 'password' => 'required']);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => trans('auth.failed')]);
    }
    public function logout() :RedirectResponse {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
