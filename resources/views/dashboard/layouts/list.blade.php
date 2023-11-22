@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Categories</li>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="col-sm-1">#</th>
                <th class="col-sm-2">Category En</th>
                <th class="col-sm-2">Category Ar</th>
                <th class="col-sm-3">Image</th>
                <th class="col-sm-4">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0)
                    {{-- @foreach ($categories as $index=> $category)
                        <tr>
                            <th scope="row">{{$index +1}}</th>
                            <td>title en</td>
                            <td>title ar</td>
                            <td><img src="../../../{{ $category->image }}" style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('admin.category.edit',["id"=>$category->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('admin.category.destroy',["id"=>$category->id, "language"=>app()->getLocale()])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach --}}
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
