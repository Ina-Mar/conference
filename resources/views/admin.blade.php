@extends('app')
@section('content')
    <div class="container pt-5" style=" min-height: 900px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('trans.Dashboard') }}</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('admin.users')}}" class="btn btn-primary">{{__('trans.Users')}}</a></li>
                        <li class="list-group-item"><a href="{{route('admin.conferences')}}" class="btn btn-primary">{{__('trans.Conferences')}}</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
