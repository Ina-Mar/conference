@extends('app')
@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <a href="/admin/users" class="navbar-brand ml-lg-3">
                <h4 class="m-0 text-uppercase text-primary"><i class="fa fa-arrow-left mr-3"></i>{{ __('trans.Back') }}</h4>
            </a>
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{__('trans.Edit User')}}</h3>
                            <form method="POST" action="/admin/users/{{$user->id}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="firstName">{{__('trans.First Name')}}<sup class="text-danger">*</sup></label>
                                            <input type="text" id="firstName" name="first_name" value="{{$user->first_name}}" class="form-control form-control-lg" />
                                            @error('first_name')
                                            <p class="text-danger text text-sm-left">{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="lastName">{{__('trans.Last Name')}}<sup class="text-danger">*</sup></label>
                                            <input type="text" id="lastName" name="last_name" value="{{$user->last_name}}" class="form-control form-control-lg" />

                                            @error('last_name')
                                            <p class="text-danger text text-sm-left">{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="emailAddress">{{__('trans.Email')}}<sup class="text-danger">*</sup></label>
                                            <input type="email" id="emailAddress" name="email" value="{{$user->email}}" class="form-control form-control-lg" />

                                            @error('email')
                                            <p class="text-danger text text-sm-left">{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="role">{{__('trans.Role')}}</label>
                                            <select class="form-select" name="role">
                                                <option value="{{$user->roles[0]['name']}}" selected>{{$user->roles[0]['name']}}</option>
                                                @foreach($roles as $role)
                                                    @if($role['name'] != $user->roles[0]['name'])
                                                        <option value="{{$role['name']}}">{{$role['name']}}</option>
                                                    @endif
                                                @endforeach
                                             </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="{{__('trans.Edit')}}" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
