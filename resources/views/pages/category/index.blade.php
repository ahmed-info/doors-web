@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4" dir="rtl">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">قائمة الاقسام الرئيسية</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.category.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    اضافة قسم رئيسي
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable" dir="rtl">
            <thead dir="rtl">
              <tr>
                <th class="">#</th>

                <th class="">عنوان القسم</th>
                <th class="">الصورة</th>
                <th class="">الاجراء</th>
              </tr>
            </thead>
            <tbody>
               @if(count($categories) > 0)
                    @foreach ($categories as $index=> $category)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$category->title}}</td>
                            <td><img src={{ $category->image }} style="width: 100px" class="img-thumbnail" alt=""></td>

                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.category.edit',['cateID'=>$category->cateID])}}" class="btn btn-primary">تعديل</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.category.destroy',["cateID"=>$category->cateID])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
