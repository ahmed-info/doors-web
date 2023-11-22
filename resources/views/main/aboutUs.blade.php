@extends('layouts.user-layout')
@section('content')
    <!-- fact-counter -->
    <section class="fact-counter counter-style-two" style="background-image: url({{ asset('images/'. $cover->cover_about) }});  background-size: auto;">

        <div class="container">
            <div class="row">
                <div class="text col-lg-12 col-md-12 col-sm-12 counter-column mt-5" style="color: red;font-size: 28px;padding-top: 30px">About Us
                    <p style="color: white;padding-top: 20px;padding-bottom: 40px">
                    @if($aboutus != null)
                    {!! $aboutus->title !!}
                    @endif
                    </p>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-monitor"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="72">0</span></div>
                        </article>
                        <div class="text">Sales and Service office</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-document"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="50">0</span></div>
                        </article>
                        <div class="text">Satellite Service <br>Locations Nationwide </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-user"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="35">0</span></div>
                        </article>
                        <div class="text">Operational <br/>Instruments</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-trophy"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="84">0</span></div>
                        </article>
                        <div class="text">Highly Trained and <br/>Dedicated Professionals</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-user"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="1000">0</span></div>
                        </article>
                        <div class="text">Customers</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->
    <!-- feature-section -->
    <section class="feature-section feature-style-two" style="padding-top: 50px !important">
        <div class="shape-1 wow zoomIn animated"></div>
        <div class="shape-2 wow zoomIn animated"></div>
        <div class="container">
            <div class="feature-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 feature-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-paper"></i></div>
                            <h4><a href="#" style="font-size: 28px"><span style="color: red">Our</span>  Vision</a></h4>
                            <div class="text">@if ($aboutus != null)
                                {!! $aboutus->ourVision !!}
                            @endif
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 feature-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-pc"></i></div>
                            <h4><a href="#" style="font-size: 28px"><span style="color: red">Our</span>  Mission</a></h4>
                            <div class="text">@if ($aboutus != null)
                                {!! $aboutus->ourMission !!}
                            @endif</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- feature-section end -->
@endsection
