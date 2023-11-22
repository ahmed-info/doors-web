@extends('layouts.user-layout')
@section('content')


<div style="background-image: url({{ asset('temp/images/background/about-pattern.png') }})">
    <div class="heading" style="padding-top: 150px">
        {{-- dataArray = product  --}}
        @if($dataArray != null)
        @foreach ($dataArray as $company)

            <h1>{{ $company['title'] }}</h1>

        @endforeach
        @endif


    </div>

   <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
            @if(count($dataArray) >0)
            @foreach ( $dataArray as $company)


            @foreach ($products as  $product)
                @if($product->company_id == $company['id'])
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
                @endif
            @endforeach

            @endforeach

            @endif
        </div>
   </div>
</div>


@endsection
