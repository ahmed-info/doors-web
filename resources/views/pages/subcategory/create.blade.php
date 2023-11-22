@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">انشاء قسم فرعي</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">انشاء</li>
            </ol>
            <form action="{{ route('dashboard.subcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="supplier_id">
                            <h6>اختر القسم الرئيسي</h6>
                        </label>

                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">اختر واحد من الاقسام</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->cateID }}"
                                    {{ old('category_id') == $category->cateID ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-3">
                            <div class="form-group mb-5">
                                <label for="title_en">
                                    <h4>اسم القسم الفرعي</h4>
                                </label>
                                <input type="text" class="form-control" id="subTitle" value="{{ old('subTitle') }}"
                                    name="subTitle" placeholder="ادخل القسم الفرعي">
                                @error('subTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group col-md-3 mt-3">
                            <h3>صورة القسم الفرعي</h3>
                            <!-- asset('assets/img/header-bg.jpg') -->
                            <label for="img">Recomended Size: 370 X 370</label>

                            <img id="img" style="height: 30vh" src="{{ asset('images/default.jpg') }}"
                                class="img-thumbnail" alt="">
                            <input type="file" class="mt-3" name="image" id="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
