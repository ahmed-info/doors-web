@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل المنتج</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">تعديل المنتج</li>
        </ol>
        <form action="{{route('dashboard.product.update',["prodID"=>$product->prodID])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            


            <div class="form-group">
                <h6>اختر القسم الفرعي</h6>
                <select  class="form-control select2" name="subcategory_id" style="..." id="subcategory_id">
                    <option value="0" selected ="selected">@lang('words.Main Category')</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->subID }}" @if($subcategory->subID == $product->subcategory_id) selected="selected" @endif>{{ $subcategory->subTitle }}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>اسم المنتج</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description"><h4>وصف المنتج</h4></label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>


            {{-- <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="description">
                        <h4>Capacity</h4>
                    </label>
                    <input type="text" class="form-control" id="capacity" name="capacity" value="{{ $product->capacity }}"
                        placeholder="Enter Capacity">
                    @error('capacity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="unit">
                        <h4>Unit</h4>
                    </label>
                    <input type="text" class="form-control" id="unit" name="unit" value="{{ $product->unit }}"
                        placeholder="Enter Unit">
                    @error('unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="quantity">
                        <h4>الكمية</h4>
                    </label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
                        placeholder="Enter Quantity">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label>
                        <h4></h4>
                    </label>
                    <div class="form-check">
                        <br>
                        <input class="form-check-input" type="checkbox" {{ $product->showIsHome==1 ? 'checked': '' }} name="showIsHome" id="selectForYou" value="1">
                        <label class="form-check-label" for="showIsHome">
                            عرض في الصفحة الرئيسة
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="deliveryTime"><h4>مدة التوصيل</h4></label>
                    <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" value="{{$product->deliveryTime}}">
                    @error('deliveryTime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-3">
                    <label for="sku"><h4>SKU</h4></label>
                    <input type="text" class="form-control" id="sku" name="sku" value="{{$product->sku}}">
                    @error('sku')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-3">
                    <label for="barcode"><h4>Barcode</h4></label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="{{$product->barcode}}">
                    @error('barcode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="form-group col-md-2 mt-3">
                <div class="form-group mb-5">
                    <label for="dgf">
                        <h4></h4>
                        <h4></h4>
                    </label>
                    <div class="form-check">
                        <br>
                        <input class="form-check-input" type="checkbox" {{ $product->selectForYou==1 ? 'checked': '' }} name="selectForYou" id="selectForYou" value="1">
                        <label class="form-check-label" for="selectForYou">
                          Select for you
                        </label>
                    </div>
                </div>
            </div> --}}

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="price">
                        <h4>السعر</h4>
                    </label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{$product->price}}"
                        placeholder="Enter Price">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="mainPriceDiscount">
                        <h4>السعر بعد التخفيض</h4>
                    </label>
                    <input type="number" step="0.01" class="form-control" id="priceDiscount" name="priceDiscount" value="{{ $product->priceDiscount }}"
                        placeholder="Enter Price Discount">
                    @error('priceDiscount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="mainPriceDiscount">
                        <h4>بلد المنشأ</h4>
                    </label>
                    <input type="text"  class="form-control" id="originCountry" name="originCountry" value="{{ $product->originCountry}}"
                        placeholder="Enter Origin Country">
                    @error('originCountry')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- table -->
            {{-- <table class="table table-hover">
                <thead class="bg-info">
                <tr>
                    <th>Size</th>
                    <th>Color En</th>
                    <th>Color Ar</th>
                    <th>Color Code</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if($product->colorSizes)
                    @foreach ($product->colorSizes as $colorSize)
                    <tr>
                        <td><input type="text" value="{{ $colorSize->size }}" name="size[]" id="size" class="form-control"></td>
                        <td><input type="text" value="{{ $colorSize->colorName_en }}" name="colorName_en[]" id="colorName_en" class="form-control"></td>
                        <td><input type="text" value="{{ $colorSize->colorName_ar }}" name="colorName_ar[]" id="colorName_ar" class="form-control"></td>
                        <td><input type="text" value="{{ $colorSize->colorCode }}" name="colorCode[]" id="colorCode" class="form-control"></td>
                        <td><input type="number" value="{{ $colorSize->qty }}" name="qty[]" id="qty" class="form-control"></td>
                        <td><input type="file" value="{{ $colorSize->image }}" name="image[]" id="image" class="form-control"></td>
                        <td><button type="button" class="btn btn-primary" id="addBtn"><i class="fa fa-plus"></i></button></td>
                    </tr>
                    @endforeach
                    @endif
                    


                </tbody>
            </table> --}}

            <div class="form-group col-md-2 mt-3">
                <h3>صورة 1</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image1 >0)
                <img style="height: 25vh" src="{{$product->image1}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image1" id="image1">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>صورة 2</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image2 >0)
                <img style="height: 25vh" src="{{$product->image2}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image2" id="image2">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>صورة 3</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image3 >0)
                <img style="height: 25vh" src="{{$product->image3}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image3" id="image3">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>صورة 4</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image4 >0)
                <img style="height: 25vh" src="{{$product->image4}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image4" id="image4">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>صورة 5</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image5 >0)
                <img style="height: 25vh" src="{{$product->image5}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image5" id="image5">
            </div>
        </div>
        <input type="submit" name="submit" value="تعديل" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#addBtn').on('click',function(){
            var html = '';
            html += '<tr>';
            html += '<td><input type="text" name="size[]" id="size" class="form-control"></td>';
            html += '<td><input type="text" name="colorName_en[]" id="size" class="form-control"></td>';
            html += '<td><input type="text" name="colorName_ar[]" id="size" class="form-control"></td>';
            html += '<td><input type="text" name="colorCode[]" id="colorCode" class="form-control"></td>';
            html +='<td><input type="number" name="qty[]" id="qty" class="form-control"></td>';
            html += '<td><input type="file" name="image[]" id="image" class="form-control"></td>';
            html += '<td><button type="button" class="btn btn-primary" id="remove"><i class="fa fa-remove"></i></button></td>';
            html += '</tr>';
            $('tbody').append(html);
        })
    });

    $(document).on('click','#remove', function(){
        $(this).closest('tr').remove();
    })
</script>
@endsection
