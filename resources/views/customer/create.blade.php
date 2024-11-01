@extends('app')
@section('content')

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form method="POST" action="/customer">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="firstName" name="first_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">First Name</label>
                                            @error('first_name')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                            @error('last_name')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                            @error('email')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <select name="conference_id" class="form-select form-control-lg">
                                            <option value="0" disabled>Choose Conference</option>
                                            @foreach($conferences as $conference)
                                                <option value="{{$conference->id}}">{{$conference->title}}</option>
                                            @endforeach
                                            @error('conference_id')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </select>


                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Register" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
