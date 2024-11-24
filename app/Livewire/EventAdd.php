<?php

namespace App\Livewire;

use Couchbase\View;
use Livewire\Component;

class EventAdd extends Component
{
    public array $events = [];
    public function render() :\Illuminate\View\View
    {
        return view('livewire.event-add');
    }
    public function mount($events) : void {
        $this->events = $events;
    }
    public function addEvent() :void {

        $this->events[] = ['time'=>'', 'event'=>''];
    }
    public function delete($index) :void {
        array_splice($this->events, $index, 1);
    }
}
