@extends('dashboard.layouts.layout')
@section('body')
    <main>
        <div class="container-fluid px-4">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <h1 class="mt-4">قائمة الاقسام الفرعية</h1>
            <ol class="breadcrumb mb-4">
                <a href="{{ route('dashboard.subcategory.create') }}">
                    <div class="btn btn-primary p-2 bd-highlight">
                        اضافة قسم فرعي
                    </div>
                </a>
            </ol>

            <table class="table table-bordered" id="myDataTable">
                <thead>
                    <tr>
                        <th class="">#</th>

                        <th class="">القسم الرئيسي</th>
                        <th class="">القسم الفرعي</th>
                        <th class="">صورة</th>
                        <th class="">الاجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($subcategories) > 0)
                        @foreach ($subcategories as $index => $subcategory)
                            <tr>
                                <th scope="">{{ $index + 1 }}</th>
                                <td>{{ $subcategory->category->title }}</td>
                                <td>{{ $subcategory->subTitle }}</td>
                                <td><img src={{ $subcategory->image }} style="width: 100px"
                                        class="img-thumbnail" alt=""></td>
                                <td>

                                    <div class="">
                                        <div class="col-sm-6">
                                            <a href="{{ route('dashboard.subcategory.edit', ['subID' => $subcategory->subID]) }}"
                                                class="btn btn-primary">تعديل</a>
                                        </div>
                                        <div class="col-sm-6">
                                        <form action="{{route('dashboard.subcategory.destroy',["subID"=>$subcategory->subID])}}" method="POST">
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
