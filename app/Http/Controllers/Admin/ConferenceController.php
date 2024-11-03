<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceValidationRequest;
use App\Models\Conference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ConferenceController extends Controller
{
    public function index() :View {
        $conferences = Conference::all()->sortByDesc('date');
        return view('conferences.index', compact('conferences'));
    }
    public function create() :View {
        return view('conferences.create');
    }
    public function store(ConferenceValidationRequest $request) :RedirectResponse {
        /**
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'contact_person' => 'string|nullable',
            'contact_email' => 'string|nullable',

        ]);**/
        $validatedData = $request->validated();
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('conferences', 'public');
        }


        Conference::query()->create($validatedData)->save();
       return redirect('/conferences');
    }
    public function edit(Conference $conference) :View {
        return view('conferences.edit', compact('conference'));
    }
    public function destroy(Conference $conference) :RedirectResponse
    {
        if(app()->getLocale() == 'lt') {
            $message = 'Konferencija ištrinta!';
        }
        else {
            $message = 'Conference deleted!';
        }
        $conference->delete();
        return redirect('/conferences')->with('user_message', $message);
    }
}
