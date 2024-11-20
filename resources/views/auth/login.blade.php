@extends('app')
@section('content')
    <section class="container-fluid bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">{{__('trans.Log In')}}</h2>

                                <form method="POST" action="/login">
                                    @csrf

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

                                    <div class="d-flex justify-content-center">
                                        <button  type="submit" data-mdb-button-init
                                                 data-mdb-ripple-init class="btn btn-info btn-block btn-lg gradient-custom-4 text-body">{{__('trans.Log In')}}</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">{{__('trans.Do not have an account?')}} <a href="/register"
                                                                                                                            class="fw-bold text-body"><u>{{__('trans.Register here')}}</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
