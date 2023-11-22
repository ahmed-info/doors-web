@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Visitors</h1>


        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Product</th>
                <th class="">Model</th>
                <th class="">Organization</th>
                <th class="">Full Name</th>
                <th class="">Email</th>
                <th class="">Phone</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($visits) > 0)
                    @foreach ($visits as $index=> $visit)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$visit->modeel->product->title}}</td>
                            <td>{{$visit->modeel->title}}</td>
                            <td>{{$visit->organization}}</td>
                            <td>{{$visit->fullName}}</td>
                            <td>{{$visit->email}}</td>
                            <td>{{$visit->phone}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.visit.destroy',["id"=>$visit->id])}}" method="POST">
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
