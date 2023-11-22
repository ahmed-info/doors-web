@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Addresses</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.address.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new Address
                </div>
            </a>
        </ol>

        <table class="table table-bordered" id="myDataTable">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Mobile</th>
                <th class="">Address</th>
                <th class="">Location</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($addresses) > 0)
                    @foreach ($addresses as $index=> $address)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$address->mobile}}</td>
                            <td>{{$address->address}}</td>
                            <td><a href="{{$address->location}}" class="btn-link">Location</a></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.address.edit',["id"=>$address->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.address.destroy',["id"=>$address->id])}}" method="POST">
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
