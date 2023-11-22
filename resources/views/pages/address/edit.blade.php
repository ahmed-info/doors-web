@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Address</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Address</li>
        </ol>
        <form action="{{route('dashboard.address.update',["id"=>$address->id])}}" method="POST">
        @csrf
        @method('put')

        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="mobile"><h4>Mobile</h4></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{$address->mobile}}">
                    @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="address_en"><h4>Address</h4></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$address->address}}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>




            <div class="form-group col-md-12 mt-3">
                <div class="form-group mb-3">
                    <label for="location"><h4>Location</h4></label>
                    <input type="text" class="form-control" id="location" name="location" value="{{$address->location}}">
                    @error('location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
