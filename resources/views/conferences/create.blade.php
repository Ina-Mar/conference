@extends('app')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <a href="{{route('admin.conferences')}}" class="navbar-brand ml-lg-3">
                <h4 class="m-0 text-uppercase text-primary"><i class="fa fa-arrow-left mr-3"></i>{{ __('trans.Back') }}</h4>
            </a>
            <div class="row mx-0 justify-content-center pt-2 pb-3">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        <h1 class="display-4">{{__('trans.Create New Conference')}}</h1>
                    </div>
                </div>
            </div>
            <form action="{{route('admin.conferences.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-conference-fields>
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="photo">{{__('trans.Photo')}}</label>
                            <input type="file" id="photo" name="photo" class="form-control" />
                            @error('photo')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </x-conference-fields>
                <livewire:speakers-add :speakers="[]" />
                <livewire:event-add :events="[]"/>
                <div class="mt-4 pt-2">
                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="{{__('trans.Create')}}" />
                </div>
            </form>
        </div>
    </div>
@endsection
