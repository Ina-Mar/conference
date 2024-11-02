@extends('app')
@section('content')
    <x-heading-card>
        <h1 class="text-white display-1">{{__('trans.Conferences')}}</h1>
        <div class="d-inline-flex text-white mb-5">
            <p class="m-0 text-uppercase"><a class="text-white" href="/">{{__('trans.Home')}}</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">{{__('trans.Conferences')}}</p>
        </div>
    </x-heading-card>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center pt-2 pb-3">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        <h1 class="display-4">{{__('trans.Conference List')}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($conferences as $conference)
                    <x-conference-list-card :conference="$conference" />
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
