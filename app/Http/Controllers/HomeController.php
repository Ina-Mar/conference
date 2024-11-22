<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() :View
    {
        $conferences = Conference::query()
            ->whereDate('date', '>=', date('Y-m-d'))->
            orderBy('date', 'desc')->limit(6)->get();

            return view('home', [
                'conferences' => $conferences
            ]);
        }


}
