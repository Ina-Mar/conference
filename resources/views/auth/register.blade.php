@extends('app')
@section('content')
    <section class="container-fluid bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">{{__('trans.Create an account')}}</h2>

                                <form method="POST" action="/register">
                                    @csrf

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">{{__('trans.First Name')}}</label>
                                        @error('first_name')
                                        <p class="text-danger text text-sm-left">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" class="form-control form-control-lg" />
                                        <label class="form-label" for="last_name">{{__('trans.Last Name')}}</label>
                                        @error('last_name')
                                        <p class="text-danger text text-sm-left">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">{{__('trans.Email')}}</label>
                                        @error('email')
                                        <p class="text-danger text text-sm-left">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">{{__('trans.Password')}}</label>
                                        @error('password')
                                        <p class="text-danger text text-sm-left">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
                                        <label class="form-label" for="password_confirmation">{{__('trans.Repeat your password')}}</label>
                                        @error('password_confirmation')
                                        <p class="text-danger text text-sm-left">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button  type="submit" data-mdb-button-init
                                                 data-mdb-ripple-init class="btn btn-info btn-block btn-lg gradient-custom-4 text-body">{{__('trans.Register')}}</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">{{__('trans.Have already an account?')}} <a href="/login"
                                                                                                            class="fw-bold text-body"><u>{{__('trans.Login here')}}</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
