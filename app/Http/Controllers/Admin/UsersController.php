<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function index() :View {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user) :View {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user) :RedirectResponse {
        if(app()->getLocale() == 'lt') {
            $message = 'Duomenys atnaujinti!';
        }
        else {
            $message = 'Edit successfully!';
        }
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $user->update($validated);
        return redirect('/users')->with('user_message', $message);
    }
    public function destroy(User $user) :RedirectResponse {
        if(app()->getLocale() == 'lt') {
            $message = 'Naudotojas ištrintas!';
        }
        else {
            $message = 'User deleted!';
        }
        $user->delete();
        return redirect('/users')->with('user_message', $message);
    }
}
