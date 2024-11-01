<!-- Header Start -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        @if(session()->has('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="position-relative text-white py-3">
                <p>{{session('message')}}</p>
            </div>
        @endif
        {{$slot}}
        <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            <div class="input-group">
                <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
