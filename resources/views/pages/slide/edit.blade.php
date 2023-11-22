@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل السلايد</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">تعديل السلايد</li>
        </ol>
        <form action="{{route('dashboard.slide.update',["id"=>$slide->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">


            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>عنوان السلايد</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$slide->title}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group col-md-4 mt-3">
                <h3>صورة السلايد</h3>
                <label for="image">Recomended Size: 1920 X 650</label>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($slide->image >0)
                <img style="height: 30vh" src="{{ $slide->image}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="{{ $slide->image }}">

                @endif
                <input type="file" class="mt-3" name="image" id="image">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
