<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create() :View {
        return view('auth.register');
    }
    public function register(UserRegistrationRequest $request) :RedirectResponse {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = new User();
        $user->fill($validated);
        $user->save();
        Auth::login($user);
        return redirect('/');

    }
}
