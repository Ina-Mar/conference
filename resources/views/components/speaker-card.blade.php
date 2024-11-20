@props(['lecturer'])
<div class="team-item">
    @if(array_key_exists('speaker_photo', $lecturer) && $lecturer['speaker_photo'] !='')
        <img class="img-fluid w-100" src="{{ asset('storage/' . $lecturer['speaker_photo'])}}" alt="">
    @else
        <img class="img-fluid w-100" src="{{asset('images/no-person.png')}}" alt="">

    @endif

    <div class="bg-light text-center p-4">
        <h5 class="mb-3">{{$lecturer['name']}}</h5>
        <p class="mb-2">{{$lecturer['position']}}</p>

    </div>
</div>
