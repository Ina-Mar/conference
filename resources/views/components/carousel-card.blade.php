@props(['conference'])

    <div class="courses-item position-relative">
        <img class="img-fluid" src="{{asset('images/courses-2.jpg')}}" alt="">
        <div class="courses-text">
            <h4 class="text-center text-white px-3">{{$conference->title}}</h4>
            <div class="border-top w-100 mt-3">
                <div class="d-flex justify-content-between p-4">
                    <span class="text-white"><i class="fa fa-clock mr-2"></i>{{$conference->date}}</span>
                </div>
                <div class="d-flex justify-content-between p-4 pt-0">
                    <span class="text-white"><i class="fa fa-location-arrow mr-2"></i>{{$conference->location}}</span>
                </div>
            </div>
            <div class="w-100 bg-white text-center p-4" >
                <a class="btn btn-primary" href="detail.html">Register</a>
            </div>
        </div>
    </div>

