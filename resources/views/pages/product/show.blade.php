@extends('layouts.user-layout')
@section('content')
    <!--------------------Slider 1------------->
    <div class="heading">
        <h1> {{ $category->{'title_' . app()->getLocale()} }} </h1>
    </div>

    <div class="container-flued">
        <div class="row row-cols-2 row-cols-md-6 g-3">
            @if (count($subcategories) > 0)
                @foreach ($subcategories as $subcategory)
                    <div>
                        <a href="{{ route('subcate.show', ['id' => $subcategory->id]) }}">
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="card" style="width: 14rem;">
                                    <img src="{{ asset('images') . '/' . $subcategory->image }}"
                                        class="card-img-top custom-border" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $subcategory->{'title_' . app()->getLocale()} }}</h5>
                                        <a href="{{ route('subcate.show', ['id' => $subcategory->id]) }}"
                                            class="btn text-dark fw-bold fs-5">@lang('words.Shop Now')<i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>





    @include('layouts.footer')
@endsection
