<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index() :View {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit(User $user) :View {
        $roles = Role::all();
        return view('users.edit', compact(['user', 'roles']));
    }
    public function update(UserEditRequest $request, User $user) :RedirectResponse {
        //dd($request['role']);
        $validated = $request->validated();
        $user->syncRoles($validated['role']);
        $user->update($validated);
        $user->save();

        return redirect('/admin/users')->with('user_message', __('trans.Edit successfully!'));
    }
    public function destroy(User $user) :RedirectResponse {
        $user->delete();
        return redirect('/admin/users')->with('user_message', __('trans.User deleted!'));
    }
}
