@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Social media</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.socialmedia.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="facebook"><h4>Facebook</h4></label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="Enter Link facebook*">
                    @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="instagram"><h4>Instagram</h4></label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="Enter link instagram">
                    @error('instagram')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>


            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="youtube">
                        <h4>Youtube</h4>
                    </label>
                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube') }}"
                        placeholder="Enter link youtube">
                    @error('youtube')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="linkedin">
                        <h4>Linkedin</h4>
                    </label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}"
                        placeholder="Enter Link linkedin">
                    @error('linkedin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="email">
                        <h4>Email</h4>
                    </label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <h3>Image Cover</h3>
                <label for="image">Recomended Size: 1920 X 300</label>
                        <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image_cover">
                @error('image_cover')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
