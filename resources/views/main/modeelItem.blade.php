@extends('layouts.user-layout')
@section('content')


<div style="background-image: url({{ asset('temp/images/background/about-pattern.png') }})">
    <div class="heading" style="padding-top: 150px">
        <h1>{{ $product->title }}</h1>


    </div>

   <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
                @if(count($product->modeels)>0)
                    @foreach ($product->modeels as $modeel)
                    <a href="{{ route('modeel.show',["id"=>$modeel->id]) }}">
                        <div class="col">
                            <div class="card h-100 slider-hover">
                            <img src="{{ asset('images' .'/'. $modeel->image) }}" class="card-img-top img-max-size" alt="Hollywood Sign on The Hill"/>
                            <div class="card-body">
                                <h5 class="card-title"><span style="color: #6c757d;font-size:22px">{{ $modeel->title }}</span> </h5>
                                <div class="card-text">
                                <span>more</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif


        </div>
   </div>
</div>


@endsection
