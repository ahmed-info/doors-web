@extends('layouts.user-layout')
@section('content')


<div style="background-image: url({{ asset('temp/images/background/about-pattern.png') }})">
    <div class="heading" style="padding-top: 150px">
        {{-- dataArray = product  --}}
        @if($dataArray != null)
        @foreach ($companies as $company)
            @if($company->id == $dataArray[0]['company_id'])
                
            <h1>{{ $company->title }}</h1>
            @endif
        @endforeach
        @endif


    </div>

   <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
            @if(count($dataArray) >0)
            @foreach ( $dataArray as $data)
            
                
                {{-- {{ $data['title']  }} --}}
            
            <a href="{{ route('product.show',["id"=>$data['id']]) }}">
                <div class="col">
                    <div class="card h-100 slider-hover">
                    <img src="{{ asset('images' .'/'. $data['image']) }}" class="card-img-top img-max-size" alt="{{ $data['title'] }}"/>
                    <div class="card-body">
                        <h5 class="card-title"><span style="color: #6c757d;font-size:22px">{{ $data['title'] }}</span> </h5>
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
