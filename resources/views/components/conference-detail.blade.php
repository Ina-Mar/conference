@props(['conference'])
<!-- Detail Start -->

                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">{{__('trans.Conference Info')}}</h6>
                        <h1 class="display-4">{{$conference->title}}</h1>
                    </div>
                    <p>{{$conference->description}}</p>
                </div>


                @if(!empty($conference->lecturers))
                    <h2 class="mb-3">{{__('trans.Speakers')}}</h2>
                <!-- Team Start -->
                <div class="container-fluid py-5">
                    <div class="container py-2">
                        <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                            @foreach($conference->lecturers as $lecturer)
                                <x-speaker-card :lecturer="$lecturer" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Team End -->
                @endif

                @if(!empty($conference->programme))
                    <h2 class="mb-3">{{__('trans.Programme')}}</h2>
                <div class="container-fluid py-5">
                    <div class="container py-2">
                        <table class="table">
                            <tbody>
                            @foreach($conference->programme as $event)
                                <tr>
                                    <td class="font-weight-bold">{{$event['time']}}</td>
                                    <td>{{$event['event']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif







<!-- Detail End -->
