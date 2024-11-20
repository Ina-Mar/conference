@extends('app')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <a href="/admin" class="navbar-brand ml-lg-3">
                <h4 class="m-0 text-uppercase text-primary"><i class="fa fa-arrow-left mr-3"></i>{{ __('trans.Back') }}</h4>
            </a>
            <div class="row mx-0 justify-content-center pt-2 pb-3">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        @if(session()->has('conference_message'))
                            <div x-data="{ show: true }" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="position-relative text-black py-3">
                                <p>{{session('conference_message')}}</p>
                            </div>
                        @endif
                        <h1 class="display-4">{{__('trans.Conferences')}}</h1>
                        <a href="/conferences/create" class="btn btn-outline-primary btn-lg"> {{__('trans.Create New')}}</a>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">{{__('trans.Title')}}</th>
                    <th scope="col">{{__('trans.Date')}}</th>
                    <th scope="col">{{__('trans.Location')}}</th>
                    <th scope="col">{{__('trans.Contact Person')}}</th>
                    <th scope="col">{{__('trans.Contact Email')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->title}}</td>
                        <td>{{$conference->date}}</td>
                        <td>{{$conference->location}}</td>
                        <td>{{$conference->contact_person}}</td>
                        <td>{{$conference->contact_email}}</td>
                        <td><a href="/conferences/{{$conference->id}}/edit" class="btn btn-primary">{{__('trans.Edit')}}</td>
                        <td>
                        @if ($conference->date >= date('Y-m-d'))

                                <form method="POST" action="/conferences/{{$conference->id}}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">{{__('trans.Delete')}}</button>

                                </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
