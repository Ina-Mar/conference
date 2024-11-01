@props(['conference'])
<div class="col-lg-4 col-md-6 pb-4">
    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="/customer/conference/{{$conference->id}}">
        <img class="img-fluid" src="{{asset('images/courses-2.jpg')}}" alt="">
        <div class="courses-text">
            <h4 class="text-center text-white px-3">{{$conference->title}}</h4>
            <div class="border-top w-100 mt-3">
                <div class="d-flex justify-content-between p-4">
                    <span class="text-white"><i class="fa fa-clock mr-2"></i>{{$conference->date}}</span>
                </div>
                <div class="d-flex justify-content-between pt-0 p-4">
                    <span class="text-white"><i class="fa fa-location-arrow mr-2"></i>{{$conference->location}}</span>
                </div>
            </div>
        </div>
    </a>
</div>
