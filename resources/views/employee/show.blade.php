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
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
    <x-conference-detail :conference="$conference"/>
                    <!--Participants start-->
                    <h2 class="mb-3">{{__('trans.Participants')}}</h2>
                    <div class="container-fluid py-5">
                        <div class="container py-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('trans.First Name')}}</th>
                                    <th scope="col">{{__('trans.Last Name')}}</th>
                                    <th scope="col">{{__('trans.Email')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{$registration->first_name}}</td>
                                        <td>{{$registration->last_name}}</td>
                                        <td>{{$registration->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--participants end-->
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

    </div>
</div>

                </div>
            </div>
        </div>
@endsection
