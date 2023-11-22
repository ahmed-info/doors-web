@extends('layouts.user-layout')
@section('content')


<div style="background-image: url({{ asset('temp/images/background/about-pattern.png') }})">
    <div class="heading" style="padding-top: 150px">
        @if($company != null)

        <h1>{{ $company->title }}</h1>
        @endif


    </div>

   <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
            @if($company != null)
                @if(count($company->products)>0)
                    @foreach ($company->products as $product)
                    <a href="{{ route('product.show',["id"=>$product->id]) }}">
                        <div class="col">
                            <div class="card h-100 slider-hover">
                            <img src="{{ asset('images' .'/'. $product->image) }}" class="card-img-top img-max-size" alt="{{ $product->title }}"/>
                            <div class="card-body">
                                <h5 class="card-title"><span style="color: #6c757d;font-size:22px">{{ $product->title }}</span> </h5>
                                <div class="card-text">
                                <span>more</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
            @endif
        </div>
   </div>
</div>


@endsection
