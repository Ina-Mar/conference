<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\Conference;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index() :View {
        $conferences = Conference::query()->
        whereDate('date', '>=', date('Y-m-d'))->
        orderBy('date', 'desc')->get();
        return view('customer.index', compact('conferences'));
    }
    public function show(Conference $conference) :View {
        return view('customer.show', ['conference' => $conference]);
    }
    public function create() :View {
        $conferences = Conference::all()->sortByDesc('date');
        return view('customer.create', compact('conferences'));
    }
    public function store(UserRegistrationRequest $request) :RedirectResponse {
        if(app()->getLocale() == 'lt') {
            $message = 'Registracija sėkminga!';
        }
        else {
            $message = 'Registration was successful!';
        }
        $validated = $request->validated();
        Registration::query()->create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'conference_id' => $validated['conference_id']

        ])->save();
        return redirect('/customer')->with('message', $message);
    }
}
