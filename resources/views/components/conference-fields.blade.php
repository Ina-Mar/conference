@props(['conference'])
<div class="row">
    <h4>{{__('trans.Main Info')}}</h4>
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="title">{{__('trans.Title')}}<sup class="text-danger">*</sup></label>
            <input type="text" id="title" name="title" value="{{old('title', optional($conference ?? null)->title)}}" class="form-control" />
            @error('title')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="date">{{__('trans.Date')}}<sup class="text-danger">*</sup></label>
            <input type="date" id="date" name="date" value="{{old('date', optional($conference ?? null)->date)}}" class="form-control" />
            @error('date')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="location">{{__('trans.Location')}}<sup class="text-danger">*</sup></label>
            <input type="text" id="location" name="location" value="{{old('location', optional($conference ?? null)->location)}}" class="form-control" />
            @error('location')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="contact_person">{{__('trans.Contact Person')}}<sup class="text-danger">*</sup></label>
            <input type="text" id="contact_person" name="contact_person" value="{{old('contact_person', optional($conference ?? null)->contact_person)}}" class="form-control" />
            @error('contact_person')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="contact_email">{{__('trans.Contact Email')}}<sup class="text-danger">*</sup></label>
            <input type="email" id="contact_email" name="contact_email" value="{{old('contact_email', optional($conference ?? null)->contact_email)}}" class="form-control" />
            @error('contact_email')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    {{$slot}}
    <div class="col-md-5 mb-3">
        <div class="form-outline">
            <label class="form-label" for="description">{{__('trans.Description')}}<sup class="text-danger">*</sup></label>
            <textarea id="description" name="description" rows="4" cols="47">{{old('description', optional($conference ?? null)->description)}}</textarea>
            @error('description')
            <p class="text-danger text text-sm-left">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>
