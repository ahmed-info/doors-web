@extends('dashboard.layouts.layout')

@section('body')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('words.dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('words.dashboard')}}</a>
        </li>
        <li class="breadcrumb-item active">داشبرد</li>


    </ol>


    {{-- {{dd($setting)}} --}}

    <div class="container-fluid">

        <div class="animated fadeIn">
            {{-- <form action="{{Route('dashboard.settings.update' , $setting)}}" method="post" enctype="multipart/form-data"> --}}
            <form action="{{Route('dashboard.settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.settings') }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-6">
                                <label>{{ __('words.phone') }}</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="{{ __('words.phone') }}" value="{{ $setting->phone }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('words.instagram') }}</label>
                                <input  type="text" name="instagram" class="form-control"
                                    placeholder="{{ __('words.instagram') }}" value="{{ $setting->instagram }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('words.whatsapp') }}</label>
                                <input  type="text" name="whatsapp" class="form-control"
                                    placeholder="{{ __('words.whatsapp') }}" value="{{ $setting->whatsapp }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('words.tiktok') }}</label>
                                <input  type="text" name="tiktok" class="form-control"
                                    placeholder="{{ __('words.tiktok') }}" value="{{ $setting->tiktok }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('words.youtube') }}</label>
                                <input  type="text" name="youtube" class="form-control"
                                    placeholder="{{ __('words.youtube') }}" value="{{ $setting->youtube }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('words.facebook') }}</label>
                                <input  type="text" name="facebook" class="form-control"
                                value="{{ $setting->facebook }}"
                                    placeholder="{{ __('words.facebook') }}" >
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <h3>Logo</h3>
                                <!-- asset('assets/img/header-bg.jpg') -->
                                @if ($setting->logo >0)
                                <img style="height: 25vh" src="{{asset('images/'.$setting->logo)}}" class="img-thumbnail" alt="">
                                @else
                                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                                @endif
                                <input type="file" class="mt-3" name="logo" id="logo">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('words.exchange rate') }}</label>
                                <input type="number" name="exchange_rate" class="form-control" value="{{ $setting->exchange_rate }}"
                                    placeholder="{{ __('words.exchange rate') }}" >
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                Submit</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                Reset</button>
                        </div>
                    </div>


            </form>
        </div>
    </div>
    @endsection
