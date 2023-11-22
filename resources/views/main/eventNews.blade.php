@extends('layouts.user-layout')
@section('content')
    <!-- page-title -->
    <section class="page-title" style="background-image: url({{ asset('images'.'/'.$cover->cover_event) }});top:100px;height:350px;background-repeat: no-repeat;">
        <div class="container">
            <div class="" style="">
                
            </div> 
        </div>
    </section>
    <!-- page-title end -->


    <!-- our-event -->
    <section class="our-event event-page">
        <div class="container">
            <div class="row">
                @if (count($events) > 0)
                    @foreach ($events as $index => $event)
                        @if ($index %2 == 0)
                            <div class="col-lg-6 col-md-12 col-sm-12 event-column">
                                <div class="single-event-content">
                                    <div class="date centred">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('d') }}
                                        <br /><span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('M') }}
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('Y') }}</span>
                                    </div>
                                    <h4><a href="event-details.html">{{ $event->title }}</a></h4>
                                    <ul class="info-content">
                                        <li><i class="fa fa-map-marker"></i>{{ $event->address }}</li>
                                        <li><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('h:i A') }}</li>
                                    </ul>
                                    <div class="link"><a href="{{ route('event.show',['id'=>$event->id]) }}"><i class="flaticon-next"></i></a></div>
                                </div>
                            </div>

                            @else
                            <div class="col-lg-6 col-md-12 col-sm-12 event-column">
                                <div class="single-event-content">
                                    <div class="date centred">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('d') }}
                                        <br /><span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('M') }}
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('Y') }}</span>
                                    </div>
                                    <h4><a href="event-details.html">{{ $event->title }}</a></h4>
                                    <ul class="info-content">
                                        <li><i class="fa fa-map-marker"></i>{{ $event->address }}</li>
                                        <li><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $event->eventDate)->format('h:i A') }}</li>
                                    </ul>
                                    <div class="link"><a href="{{ route('event.show',['id'=>$event->id]) }}"><i class="flaticon-next"></i></a></div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                @endif



            </div>
        </div>
    </section>
    <!-- our-event -->
@endsection
