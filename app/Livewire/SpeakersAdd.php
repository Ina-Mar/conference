<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class SpeakersAdd extends Component
{
    use WithFileUploads;
    public array $speakers= [];
    public function render() :View
    {
        return view('livewire.speakers-add');
    }
    public function mount($speakers) : void {
        $this->speakers = $speakers;
    }
    public function addSpeaker() :void {

        $this->speakers[] = ['name'=>'', 'position'=>'', 'speaker_photo'=>''];
    }
    public function delete($index) :void {
        //$speaker = $this->speakers[$index];
        array_splice($this->speakers, $index, 1);
       // $speaker->delete();
    }
}
