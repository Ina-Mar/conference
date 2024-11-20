<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
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
    public function store(ConferenceRequest $request) :RedirectResponse {
       //dd($request->all()['lecturers']);
        $lecturers = $this->getLecturers($request['lecturers']);


        $validatedData = $request->validated();
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('conferences', 'public');
        }
        $validatedData['lecturers'] = $lecturers;


        Conference::query()->create($validatedData)->save();
        return redirect('/conferences')->with('conference_message', __('trans.Conference created successfully'));

    }
    public function edit(Conference $conference) :View {
        return view('conferences.edit', compact('conference'));
    }
    public function update(ConferenceRequest $request, Conference $conference) :RedirectResponse {
        $validatedData = $request->validated();
        $lecturers = $this->getLecturers($request['lecturers']);
        $lecturersOriginal = $conference::query()->select('lecturers')->where('id', '=', $conference->getId())->get()->toArray();
        for ($i = 0; $i < count($lecturers); $i++) {
            if (empty($lecturers[$i]['speaker_photo'])) {
                for ($j = 0; $j < count($lecturersOriginal[0]['lecturers']); $j++) {
                    if ($lecturersOriginal[0]['lecturers'][$j]['name'] == $lecturers[$i]['name']) {
                        if (array_key_exists('speaker_photo', $lecturersOriginal[0]['lecturers'][$j])) {
                            $lecturers[$i]['speaker_photo'] = $lecturersOriginal[0]['lecturers'][$j]['speaker_photo'];
                            break;
                        }
                    }
                }
            }

        }
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('conferences', 'public');
        }
        $validatedData['lecturers'] = $lecturers;

        $conference->update($validatedData);
        $conference->save();
        return redirect('/conferences')->with('conference_message', __('trans.Conference updated successfully'));
    }
    public function destroy(Conference $conference) :RedirectResponse
    {
        if(app()->getLocale() == 'lt') {
            $message = __('trans.Conference Deleted');;
        }
        else {
            $message = 'Conference deleted!';
        }
        $conference->delete();
        return redirect('/conferences')->with('user_message', $message);
    }

    /**
     * @param $lecturers1
     * @return array
     */
    public function getLecturers($lecturers1): array
    {
        $lecturers = [];
        if ($lecturers1) {
            foreach ($lecturers1 as $lecturer) {
                $data = [];
                $data['name'] = $lecturer['name'];
                $data['position'] = $lecturer['position'];
                if (array_key_exists('speaker_photo', $lecturer)) {
                    $data['speaker_photo'] = $lecturer['speaker_photo']->store('lecturers', 'public');
                } else {
                    $data['speaker_photo'] = '';
                }
                $lecturers[] = $data;
            }
        }
        return $lecturers;
    }
}
