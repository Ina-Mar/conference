@extends('app')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center pt-2 pb-3">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        @if(session()->has('user_message'))
                            <div x-data="{ show: true }" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="position-relative text-black py-3">
                                <p>{{session('user_message')}}</p>
                            </div>
                        @endif
                        <h1 class="display-4">{{__('trans.Users')}}</h1>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('trans.First Name')}}</th>
                    <th scope="col">{{__('trans.Last Name')}}</th>
                    <th scope="col">{{__('trans.Email')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">{{__('trans.Edit')}}</td>
                        <td>
                            <form method="POST" action="/users/{{$user->id}}/delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary">{{__('trans.Delete')}}</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
