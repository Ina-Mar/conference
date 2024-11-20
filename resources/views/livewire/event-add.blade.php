<div class="row">
    <h4 class="pt-5">{{__('trans.Programme')}}</h4>
    <table class="table table-bordered">
        <tr>
            <th>{{__('trans.Time')}}</th>
            <th>{{__('trans.Event')}}</th>
            <th class=""><button wire:click="addEvent()" type="button" name="add_event" id="add_event" class="btn btn-success">{{__('trans.Add')}}</button></th>
        </tr>
        @foreach($events as $index=>$event)
            <tr>
                <td><input wire:model="events.{{$index}}.time" type="time" name="programme[{{$index}}][time]" class="form-control"></td>
                <td><input wire:model="events.{{$index}}.event" type="text" name="programme[{{$index}}][event]" class="form-control"></td>
                <td><button wire:click="delete({{$index}})" type="button" name="remove_event"  class="btn btn-outline-danger">{{__('trans.Remove')}}</button></td>
            </tr>
        @endforeach


    </table>
</div>
