@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">انشاء منتج جديد</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">انشاء</li>
            </ol>
            <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="subcategory_id">
                            <h6>اختر القسم الفرعي</h6>
                        </label>

                        <select name="subcategory_id" id="subcategory_id" class="form-control" >
                            <option value="">اختر القسم الفرعي</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->subID }}"
                                    {{ old('subcategory_id') == $subcategory->subID ? 'selected' : '' }}>
                                    {{ $subcategory->subTitle }}
                                </option>
                            @endforeach
                        </select>

                        @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>




                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-3">

                        <div class="form-group mb-5">
                            <label for="title_ar">
                                <h4>اسم المنتج</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                                placeholder="ادخل اسم المنتج">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="description">
                                <h4>الوصف</h4>
                            </label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"
                                placeholder="ادخل وصف المنتج">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="capacity">
                                <h4>Capacity</h4>
                            </label>
                            <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}"
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
                            <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit') }}"
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
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                placeholder="ادخل الكمية">
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
                                <input class="form-check-input" type="checkbox" {{ old('showIsHome')==1 ? 'checked' : '' }} name="showIsHome" id="selectForYou" value="1">
                                <label class="form-check-label" for="showIsHome">
                                    عرض في الصفحة الرئيسية
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <div class="form-group mb-5">
                            <label for="deliveryTime">
                                <h4>مدة التوصيل</h4>
                            </label>
                            <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" value="{{ old('deliveryTime') }}"
                                placeholder="مثال: 1-2 يوم">
                            @error('deliveryTime')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>SKU</h4>
                            </label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}"
                                placeholder="Enter SKU">
                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
 --}}
                    {{-- <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>Barcode</h4>
                            </label>
                            <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode') }}"
                                placeholder="Enter barcode">
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
                                <input class="form-check-input" type="checkbox" {{ old('selectForYou')==1 ? 'checked' : '' }} name="selectForYou" id="selectForYou" value="1">
                                <label class="form-check-label" for="selectForYou">
                                  Select for you
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="price">
                                <h4>السعر</h4>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}"
                                placeholder="السعر الرئيسي">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="priceDiscount">
                                <h4>السعر بعد التخفيض</h4>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="priceDiscount" name="priceDiscount" value="{{ old('priceDiscount') }}"
                                placeholder="ادخل السعر بعد التخفيض">
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
                            <input type="text"  class="form-control" id="originCountry" name="originCountry" value="{{ old('originCountry') }}"
                                placeholder="ادخل بلد المنشأ">
                            @error('originCountry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- table -->
                    <table class="table table-hover">
                        <thead class="bg-info">
                        <tr>
                            <th>القياس</th>
                            <th>اللون</th>
                            <th>Color Code</th>
                            <th>Quantity</th>
                            <th>صورة اللون</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" name="size[]" id="size" class="form-control"></td>
                            <td><input type="text" name="colorName[]" id="colorName" class="form-control"></td>
                            <td><input type="text" name="colorCode[]" id="colorCode" class="form-control"></td>
                            <td><input type="number" name="qty[]" id="qty" class="form-control"></td>
                            <td><input type="file" name="image[]" id="image" class="form-control"></td>
                            <td><button type="button" class="btn btn-primary" id="addBtn"><i class="fa fa-plus"></i></button></td>
                        </tr>

                        </tbody>
                    </table>



                    <div class="form-group col-md-12 mt-3">
                        <h4>صورة 1</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image1" id="image1">
                        @error('image1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>صورة 2</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image2" id="image2">
                        @error('image2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>صورة 3</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image3" id="image3">
                        @error('image3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>صورة 4</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image4" id="image4">
                        @error('image4')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>صورة 5</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image5" id="image5">
                        @error('image5')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
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
            html += '<td><input type="text" name="colorName[]" id="size" class="form-control"></td>';
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
