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
                        <h1 class="display-4">{{__('trans.Edit Conference')}}</h1>
                    </div>
                </div>
            </div>
            <form action="/admin/conferences/{{$conference->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-conference-fields :conference="$conference">
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$conference->photo ? asset('storage/' . $conference->photo) : asset('images/courses-2.jpg')}}" alt="">
                                <div class="card-body">
                                    <label class="form-label" for="photo">{{__('trans.Photo')}}</label>
                                    <input type="file" id="photo" name="photo" class="form-control" />
                                    @error('photo')
                                    <p class="text-danger text text-sm-left">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </x-conference-fields>
                <livewire:speakers-add :speakers="$conference->lecturers" />
                <livewire:event-add :events="$conference->programme" />

                <div class="mt-4 pt-2">
                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="{{__('trans.Edit')}}" />
                </div>
            </form>
        </div>
    </div>
@endsection
