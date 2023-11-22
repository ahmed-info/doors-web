@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">قائمة المنتجات</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.product.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    اضافة منتج جديد
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">القسم الفرعي</th>
                <th class="">اسم المنتج</th>
                <th class="">الكمية</th>
                <th class="">السعر</th>
                <th class="">السعر بعد التخفيض</th>
                <th class="">صورة</th>
                <th class="">الاجراء</th>
              </tr>
            </thead>
            <tbody>
                @if(count($products) > 0)
                    @foreach ($products as $index=> $product)
                        <tr>
                            <th scope="">{{$index +1}}</th>

                            <td>{{$product->subcategory->subTitle  }}</td>
                            <td>{{$product->title  }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->priceDiscount }}</td>
                            <td><img src={{ $product->image1}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td class="d-flex">

                                <div class="d-flex">
                                    <div class="d-flex">
                                        <a href="{{route('dashboard.product.edit',["prodID"=>$product->prodID])}}" class="btn btn-primary">تعديل</a>

                                        <form class="d-flex" action="{{route('dashboard.product.destroy',["prodID"=>$product->prodID])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat d-flex show_confirm" data-toggle="tooltip" title='Delete'>حذف</button>
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
