@extends('layouts.user-layout')
@section('content')
    <!-- cta-section -->
    <section class="cta-section" style="background-image: url({{ asset('images'.'/'.$cover->cover_company) }});top:0px;height:600px;width:auto;background-repeat: no-repeat;">

    </section>
    <!-- cta-section end -->
    <!-- gallery-section -->
    <section class="gallery-section">
        <div class="container">
            <div class="title-box">
                <div class="sec-title"><span style="color: red">Global</span>  Parteners</div>
            </div>
            <div class="sortable-masonry">
                <!--Filter-->
                {{-- <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns centred clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">All</li>
                        <li class="filter" data-role="button" data-filter=".design">Design</li>
                        <li class="filter" data-role="button" data-filter=".graphic">Graphic</li>
                        <li class="filter" data-role="button" data-filter=".photography">Photography</li>
                    </ul>
                </div> --}}
                <div class="items-container row clearfix">
                    @if (count($companies) > 0)
                        @foreach ($companies as $company)
                            <!--Default Portfolio Item-->
                            <div class="col-lg-4 col-md-6 col-sm-12 gallery-item masonry-item all graphic design">
                                <div class="inner-box">
                                    <a href="{{ route('company.show',["id"=>$company->id]) }}">
                                        <figure class="image-box hoverGlobal">
                                        <img src="{{ asset('images'.'/'.$company->image) }}" alt="">
                                        <div class="">
                                            {{-- <div class="wrapper">
                                                <div class="text">Corporate</div>
                                                <h4 class="title"><a href="#">Research Group</a></h4>
                                            </div> --}}
                                        </div>
                                    </figure>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </section>
    <!-- gallery-section end -->
@endsection
