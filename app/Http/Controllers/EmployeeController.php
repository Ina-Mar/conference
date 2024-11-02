<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index() :View {
        $conferences = Conference::all();
        return view('employee.index', compact('conferences'));
    }
    public function show(Conference $conference) :View
    {

        $registrations = Registration::query()->where('conference_id', $conference->getId())->get();
        return view('employee.show', compact(['conference', 'registrations']));
    }
}
