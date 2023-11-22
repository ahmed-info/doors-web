@extends('layouts.user-layout')
@section('content')
    <!-- page-title -->
    <section class="page-title centred" style="background-image: url(images/background/page-title.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title">Our Events</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Our Events</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <section class="event-details event-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 event-column">
                    <div class="event-details-content">
                        <div class="content-style-one">
                            <figure class="image-box"><img src="{{ asset('images/'. $event->image) }}" alt=""></figure>
                            <div class="event-title">{{ $event->title }}</div>
                            <ul class="info-content">
                                <li><i class="fa fa-map-marker"></i>{{ $event->address }}</li>
                                <li><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('h:i: A') }}</li>
                                <li><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('M') }} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('d') }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('Y') }}</li>
                            </ul>
                            <div class="top-text">
                                {{ $event->description }}
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
