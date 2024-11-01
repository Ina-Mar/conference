@props(['lecturer'])
<div class="team-item">
    <img class="img-fluid w-100" src="{{asset('images/team-1.jpg')}}" alt="">
    <div class="bg-light text-center p-4">
        <h5 class="mb-3">{{$lecturer['name']}}</h5>
        <p class="mb-2">{{$lecturer['position']}}</p>

    </div>
</div>
