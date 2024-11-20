<div class="row">
    <h4 class="pt-5 pb-3">{{__('trans.Speakers')}}</h4>

    <table class="table table-bordered">
        <tr>
            <th>{{__('trans.Full Name')}}</th>
            <th>{{__('trans.Position')}}</th>
            <th>{{__('trans.Photo')}}</th>
            <th><button wire:click="addSpeaker()" type="button" name="add_speaker" class="btn btn-success">{{__('trans.Add')}}</button></th>
        </tr>
        @foreach($speakers as $index=>$speaker)
        <tr>
            <td><input wire:model="speakers.{{$index}}.name" type="text" name="lecturers[{{ $index }}][name]" class="form-control"></td>
            <td><input wire:model="speakers.{{$index}}.position" type="text" name="lecturers[{{ $index }}][position]" class="form-control"></td>
            <td><div class="card" style="width: 18rem;">
                    @if(array_key_exists('speaker_photo', $speaker))
                        <img class="card-img-top" style="width: 10rem;" src="{{asset('storage/'.$speaker['speaker_photo'])}}" alt="">
                    @else
                        <img class="card-img-top" style="width: 10rem;" src="" alt="">
                    @endif

                    <div class="card-body">
                        <input wire:model="speakers.{{$index}}.speaker_photo" type="file" name="lecturers[{{ $index }}][speaker_photo]" class="form-control">
                    </div>
                </div>
               </td>
            <td><button wire:click="delete({{$index}})" type="button" name="remove_speaker" class="btn btn-outline-danger">{{__('trans.Remove')}}</button></td>
        </tr>
        @endforeach
    </table>
</div>
