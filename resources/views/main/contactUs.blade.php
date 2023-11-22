@extends('layouts.user-layout')
@section('content')
    <!-- page-title -->
    <section class="page-title" style="background-image: url({{ asset('images'.'/'.$cover->cover_contact) }});top:0px;height:550px;width:90vw;background-repeat: no-repeat;">

    </section>
    <!-- page-title end -->


    <!-- single-team -->
    <section class="single-team single-team-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column" style="background-color: gray55">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Our team is here to answer all your questions. For any inquiry or
                                comment, feel free to leave a message in the below form and we’ll
                                .get back to you as soon as possible</h6>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                            <form action="{{ route('contact.us.store') }}" method="POST">
                                @csrf
                            <table class="table table-hover table-bordered text-nowrap">

                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="fullName" id="fullName"
                                                    placeholder="Name">
                                                    @error('fullName')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="organization"
                                                    id="organization" placeholder="Organization/ Company">
                                                    @error('organization')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    placeholder="Mobile No">
                                                    @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email Address">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">
                                            <div class="mb-3">
                                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your Message"></textarea>
                                                @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </td>

                                    </tr>




                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-danger mx-2 my-2">Send</button>
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <figure class="image-box"><img src="{{ asset('assets/images/iq.png') }}" alt="iraq map"></figure>
                </div>
            </div>
        </div>
    </section>
    <!-- single-team end -->
    <section class="service-style-three">
        <div class="container">
            <div class="row">
                @if (count($addresses) >0)
                    @foreach ($addresses as $index=> $address)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white mb-3" style="max-width: 18rem;background-color:#393C43">
                            <div class="card-header footer-title">Address {{ $index +1 }}</div>

                            <div class="link-widget footer-widget">
                                <ul class="link-list d-flex">
                                    <i class="fa fa-map-marker ms-2" style="font-size: 24px;color:red"></i>
                                    <li class="mx-3" style="text-align: center">
                                        <a  href="{{ $address->location }}">{{ $address->address }}</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="link-widget footer-widget" style="margin-top: 15px;margin-bottom:15px">
                                <ul class="link-list d-flex">
                                    <i class="fa fa-phone ms-2" style="font-size: 24px;color:red"></i>
                                    <li class="mx-3" style="text-align: center">
                                        <a  href="tel:{{ $address->mobile  }}">{{ $address->mobile }}</a>
                                    </li>
                                </ul>
                            </div>

                          </div>
                        {{-- <div class="single-service-content">
                            <div class="p-4 hoverGlobal">
                                <h5>Address</h5>
                                <div class="" style="font-size: 24px"><i class="fa fa-map-marker"></i><a style="margin-left: 10px" href="{{ $address->location }}">{{ $address->address }}</a></div>
                                <h4 class="pt-4"><i class="fa fa-phone"></i> Call:  <span class="text">{{ $address->mobile }}</span>  </h4>
                            </div>
                        </div> --}}
                    </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
    <!-- contact-section -->

    <!-- contact-section end -->
@endsection
