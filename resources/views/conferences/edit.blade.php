@extends('app')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <a href="/conferences" class="navbar-brand ml-lg-3">
                <h4 class="m-0 text-uppercase text-primary"><i class="fa fa-arrow-left mr-3"></i>{{ __('trans.Back') }}</h4>
            </a>
            <div class="row mx-0 justify-content-center pt-2 pb-3">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        <h1 class="display-4">{{__('trans.Edit Conference')}}</h1>
                    </div>
                </div>
            </div>
            <form action="/conferences" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <h4>{{__('trans.Main Info')}}</h4>
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="title">{{__('trans.Title')}}</label>
                            <input type="text" id="title" name="title" value="{{$conference->title}}" class="form-control" />
                            @error('title')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="date">{{__('trans.Date')}}</label>
                            <input type="date" id="date" name="date" value="{{$conference->date}}" class="form-control" />
                            @error('date')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="location">{{__('trans.Location')}}</label>
                            <input type="text" id="location" name="location" value="{{$conference->location}}" class="form-control" />
                            @error('location')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="contact_person">{{__('trans.Contact Person')}}</label>
                            <input type="text" id="contact_person" name="contact_person" value="{{$conference->contact_person}}" class="form-control" />
                            @error('contact_person')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="contact_email">{{__('trans.Contact Email')}}</label>
                            <input type="email" id="contact_email" name="contact_email" value="{{$conference->contact_email}}" class="form-control" />
                            @error('contact_email')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
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
                    <div class="col-md-5 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="description">{{__('trans.Description')}}</label>
                            <textarea id="description" name="description" rows="4" cols="45">{{$conference->description}}</textarea>
                            @error('description')
                            <p class="text-danger text text-sm-left">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="pt-5">{{__('trans.Speakers')}}</h4>
                    <table class="table table-bordered" id="table1">
                        <tr>
                            <th>{{__('trans.Full Name')}}</th>
                            <th>{{__('trans.Position')}}</th>
                            <th>{{__('trans.Photo')}}</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="inputs[0]['name']" value="{{$conference->lecturers[0]['name']}}" class="form-control"></td>
                            <td><input type="text" name="inputs[0]['position']" value="{{$conference->lecturers[0]['position']}}" class="form-control"></td>
                            <td>
                                <div class="card" style="width: 8rem;">
                                        <img class="card-img-top" src="{{$conference->photo ? asset('storage/' . $conference->photo) : asset('images/courses-2.jpg')}}" alt="">
                                </div>
                                <input type="file" name="inputs[0]['speaker_photo']" value="{{$conference->lecturers[0]['name']}}" class="form-control"></td>
                            <td><button type="button" name="add_speaker" id="add_speaker" class="btn btn-success">{{__('trans.Add')}}</button></td>
                        </tr>
                        @for($i=1; $i<sizeof($conference->lecturers); $i++)
                            <tr>
                                <td><input type="text" name="inputs[0]['name']" value="{{$conference->lecturers[$i]['name']}}" class="form-control"></td>
                                <td><input type="text" name="inputs[0]['position']" value="{{$conference->lecturers[$i]['position']}}" class="form-control"></td>
                                <td>
                                    <div class="card" style="width: 8rem;">
                                        <img class="card-img-top" src="{{$conference->photo ? asset('storage/' . $conference->photo) : asset('images/courses-2.jpg')}}" alt="">
                                    </div>
                                    <input type="file" name="inputs[0]['speaker_photo']" value="{{$conference->lecturers[0]['name']}}" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger remove-table-row">Remove</button></td>
                            </tr>
                        @endfor
                    </table>
                </div>
                <div class="row">
                    <h4 class="pt-5">{{__('trans.Programme')}}</h4>
                    <table class="table table2 table-bordered" id="table2">
                        <tr>
                            <th>{{__('trans.Time')}}</th>
                            <th>{{__('trans.Event')}}</th>
                        </tr>
                        <tr>
                            <td><input type="time" name="inputs[0]['time']" value="{{$conference->programme[0]['time']}}" class="form-control"></td>
                            <td><input type="text" name="inputs[0]['event']" value="{{$conference->programme[0]['event']}}" class="form-control"></td>
                            <td><button type="button" name="add_event" id="add_event" class="btn btn-success">{{__('trans.Add')}}</button></td>
                        </tr>
                        @for($x=1; $x<sizeof($conference->programme); $x++)
                            <tr>
                            <td><input type="time" name="inputs[0]['time']" value="{{$conference->programme[$x]['time']}}" class="form-control"></td>
                            <td><input type="text" name="inputs[0]['event']" value="{{$conference->programme[$x]['event']}}" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger remove-table-row-2">Remove</button></td>
                            </tr>
                        @endfor

                    </table>
                </div>
                <div class="mt-4 pt-2">
                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="{{__('trans.Edit')}}" />
                </div>
            </form>
        </div>
    </div>
@endsection
