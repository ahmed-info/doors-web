@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">Socila Media</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.socialmedia.edit') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new Social
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Category En</th>
                <th class="">Category Ar</th>
                <th class="">Description EN</th>
                <th class="">Description Ar</th>
                <th class="">Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($socialmedias) > 0)
                    @foreach ($socialmedias as $index=> $socialmedia)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$category->title_en}}</td>
                            <td>{{$category->title_ar}}</td>
                            <td>{{$category->description_en}}</td>
                            <td>{{$category->description_ar}}</td>
                            <td><img src={{  asset('images' ).'/'.$category->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.category.edit',["id"=>$category->cateID])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.category.destroy',["id"=>$category->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
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
