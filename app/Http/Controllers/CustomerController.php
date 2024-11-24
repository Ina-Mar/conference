<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index() :View {
        if (!Auth::check() || Auth::user()->hasRole('user')) {
            $conferences = Conference::query()->
            whereDate('date', '>=', date('Y-m-d'))->
            orderBy('date', 'desc')->get();
        }
       else {
           $conferences = Conference::all();

       }
        return view('customer.index', compact('conferences'));
    }
    public function show(Conference $conference) :View {
            $registrations = Conference::query()->find($conference->getId());
            $participants =$registrations->participants;

        return view('customer.show', ['conference' => $conference, 'registrations' => $participants]);
    }
//
    public function store(Conference $conference) :RedirectResponse {
        $user = Auth::id();
        $conference_id = $conference->getId();
        $check = Registration::query()->where('conference_id', $conference_id)->
        where('user_id', $user)->first();
        if (!$check) {
            Registration::query()->create(['user_id' => $user, 'conference_id' => $conference_id])->save();
            return redirect('/conference')->with('message', __('trans.Registration successful!'));
        }
        else{
            return redirect('/conference')->with('message', __('trans.You are already registered!'));
        }


    }
}
