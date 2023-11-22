@extends('layouts.user-layout')
@section('content')
        <!-- page-title -->
        <div style="background: rgba(255, 13, 21, 0.50);">
            <img style="background: rgba(255, 13, 21, 0.50);top:50px;height:auto;width:100%;background-repeat: no-repeat;" src="{{ asset('images/'.$cover->cover_department) }}" alt="">
        </div>
        <!-- page-title end -->

<!-- news-section -->
<section class="news-section gray-bg">
    <div class="container">
        <div class="title-box">
            <div class="sec-title">{{ $department->title }}</div>
        </div>

        @foreach ($department->companies as $company)
        <a href="{{ route('company.show',["id"=>$company->id]) }}">

            <div class="title-text" style="margin-top: 150px;margin-bottom: 100px">{!! $company->title !!}</div>
        </a>
        <div class="news-content">
            <div class="four-column-carousel">
                @foreach ($company->products as $product)
                <div class="single-news-content">
                    @if(count($product->imageproducts) >0 )
                        <a href="{{ route('product.show',["id"=>$product->id]) }}">

                            <figure class="myhover image-box"><img src="{{ asset('images'.'/'.$product->image) }}" alt=""></figure>
                        </a>
                    @endif
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

{{-- end department --}}
    </div>
</section>
<!-- news-section end -->

@endsection
