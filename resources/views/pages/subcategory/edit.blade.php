@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">تعديل القسم الفرعي</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">تعديل القسم الفرعي</li>
            </ol>
            <form action="{{ route('dashboard.subcategory.update', ['subID' => $subcategory->subID]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group">
                        <h6>اختر القسم الرئيسي</h6>
                        <select class="form-control select2" name="category_id" style="..." id="category_id">
                            <option value="0" selected="selected">Main Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->cateID }}"
                                    @if ($category->cateID == $subcategory->category_id) selected="selected" @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-3">
                            <label for="title_en">
                                <h4>القسم الفرعي</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $subcategory->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group col-md-4 mt-3">
                        <h3>صورة القسم الفرعي</h3>
                        <label for="img">Recomended Size: 370 X 370</label>
                        <!-- asset('assets/img/header-bg.jpg') -->
                        @if ($subcategory->image > 0)
                            <img style="height: 30vh" src="{{ $subcategory->image }}" class="img-thumbnail"
                                alt="">
                        @else
                            <img style="height: 30vh" src="{{ asset('images/default.jpg') }}" class="img-thumbnail"
                                alt="">
                        @endif
                        <input type="file" class="mt-3" name="image" id="image">
                    </div>


                </div>
                <input type="submit" name="submit" value="تعديل" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
