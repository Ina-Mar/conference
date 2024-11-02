@extends('app')
@section('content')
    <x-heading-card>
        <h1 class="text-white display-1">{{__('trans.Conference')}}</h1>
        <div class="d-inline-flex text-white mb-5">
            <p class="m-0 text-uppercase"><a class="text-white" href="/">{{__('trans.Home')}}</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">{{__('trans.Conference')}}</p>
        </div>
    </x-heading-card>
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">{{__('trans.Conference Info')}}</h6>
                            <h1 class="display-4">{{$conference->title}}</h1>
                        </div>
                        <p>{{$conference->description}}</p>
                    </div>

                    <h2 class="mb-3">{{__('trans.Speakers')}}</h2>
                    <!-- Team Start -->
                    <div class="container-fluid py-5">
                        <div class="container py-2">
                            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                                @foreach($conference->lecturers as $lecturer)
                                    <x-speaker-card :lecturer="$lecturer" />
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- Team End -->

                    <h2 class="mb-3">{{__('trans.Programme')}}</h2>
                    <div class="container-fluid py-5">
                        <div class="container py-2">
                            <table class="table">
                                <tbody>
                                @foreach($conference->programme as $event)
                                    <tr>
                                        <td class="font-weight-bold">{{$event['time']}}</td>
                                        <td>{{$event['event']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">{{__('trans.About')}}</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">{{__('trans.Starts')}}</h6>
                            <h6 class="text-white my-3">{{$conference->date}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">{{__('trans.Location')}}</h6>
                            <h6 class="text-white my-3 ml-5">{{$conference->location}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">{{__('trans.Contact Person')}}</h6>
                            <h6 class="text-white my-3">{{$conference->contact_person}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">{{__('trans.Contact Email')}}</h6>
                            <h6 class="text-white my-3">{{$conference->contact_email}}</h6>
                        </div>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="/customer/register">{{__('trans.Register')}}</a>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

@endsection
