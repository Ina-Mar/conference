<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Conferences</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">

</head>
<body>

<!-- Topbar Start -->
<div class="container-fluid bg-dark">
    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>info@conference.com</small>
            </div>
        </div>

        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <form action="{{ route('locale.change') }}" method="POST">
                    @csrf
                    <select class="form-select-sm" name="locale" onchange="this.form.submit()">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>English</option>
                        <option value="lt"{{ app()->getLocale() == 'lt' ? ' selected' : '' }}>Lietuvių</option>
                        <!-- Additional language options -->
                    </select>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>{{ __('trans.Conferences') }}</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link active">{{__('trans.Home') }}</a>
                <a href="{{route('conference.index')}}" class="nav-item nav-link">{{ __('trans.Conferences') }}</a>

            </div>
            @auth
                <span class="py-2 px-4 font-weight-bold text-uppercase">{{__('trans.Welcome')}}, {{auth()->user()->first_name}}</span>
                <form class="form-inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-primary py-2 px-4 d-none d-lg-block">{{__('trans.Log Out')}}</button>
                </form>
            @else
                <a href="/register" class="btn btn-primary py-2 mr-2 px-4 d-none d-lg-block">{{__('trans.Register')}}</a>
                <a href="/login" class="btn btn-primary py-2 px-4 d-none d-lg-block">{{__('trans.Log In')}}</a>
            @endauth

        </div>
    </nav>
</div>
<!-- Navbar End -->



<main>
    @yield('content')
</main>
<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="/" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>{{ __('trans.Conferences') }}</h1>
                </a>
                <p class="m-0">Accusam nonumy clita sed rebum kasd eirmod elitr. Ipsum ea lorem at et diam est, tempor rebum ipsum sit ea tempor stet et consetetur dolores. Justo stet diam ipsum lorem vero clita diam</p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">{{__('trans.Get In Touch')}}</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@conference.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                    <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">{{ __('trans.Conferences') }}</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Research</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">{{__('trans.Quick Links')}}</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{__('trans.Privacy Policy')}}</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{__('trans.Terms & Condition')}}</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{__('trans.Regular FAQs')}}</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{__('trans.Help & Support')}}</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>{{__('trans.Contact')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0">Copyright &copy; <a class="text-white" href="/">Ina Martinkutė PIT-21-I-NT</a>.
                </p>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->
<a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>



<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</body>
</html>
