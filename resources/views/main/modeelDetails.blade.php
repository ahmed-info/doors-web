@extends('layouts.user-layout')
@section('content')


    <div class="pb-5" style="background-image: url({{ asset('temp/images/background/about-pattern.png') }})">
        <div class="container-fluid">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <h2 style="position: relative;text-align: left important;padding-top: 150px; padding-left: 50px">
                {{ $modeel->product->title }}</h2>
        </div>

        <div class="heading" style="padding-top: 30px">
            <div style="display: block !important">

            </div>
            <h1>{{ $modeel->title }}</h1>
        </div>

        <div class="container">
            <div class="card card-solid ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                <img src="{{ asset('images' . '/' . $modeel->image) }}" class="product-image"
                                    alt="Product Image">
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Model's specification</h4>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover table-bordered text-nowrap">

                                        <tbody>
                                            @if (count($modeel->modeeldetails) > 0)
                                                @foreach ($modeel->modeeldetails as $detail)
                                                    <tr>
                                                        <th width="35%">{{ $detail->title }}</th>
                                                        <td>{{ $detail->description }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif




                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>



                    </div>

                </div>
                <!-- /.card-body -->
            </div>

        </div>


        <section class="about-style-six">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="about-content">
                            <div class="title-box">
                                <div class="sec-title">Description descriptions</div>
                            </div>
                            <div class="text">
                                <p>{{ $modeel->description }}</p>
                            </div>
                            {{-- <div class="link"><a href="#" class="theme-btn">Read More</a></div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                        <div class="video-content">
                            <div class="video-gallery">
                                @if ($modeel->linkVideo != '' && $modeel->linkVideo != null)
                                    {{-- <iframe width="520" height="520" src="https://www.youtube.com/embed/CSEFdG4RTOY?si=Z9tB0uZqJHbY4CEi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                                    {{-- <img src="{{ asset('temp/images/resource/video-image-3.jpg') }}" alt="Awesome Video Gallery"> --}}
                                    <video width="520" height="520" controls>
                                        <source src="https://www.youtube.com" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="overlay-gallery">
                                        <div class="icon-holder">
                                            <div class="icon wow zoomIn animated" data-wow-delay="300ms"
                                                data-wow-duration="1500ms"
                                                style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: zoomIn;">
                                                <a class="html5lightbox" title="Video" href="{{ $modeel->linkVideo }}"><i
                                                        class="flaticon-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ asset('images/' . $modeel->image) }}" alt="default image">
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($modeel->filePDF != null && $modeel->filePDF != '')
                        <!-- Button trigger modal -->
                        <button type="button" class="col-md-2 btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-file-pdf-o"></i> Download PDF
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('visit.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="modeel_id" id=" modeel_id"
                                                value="{{ $modeel->id }}">
                                            <div class="mb-3">
                                                <input type="text" name="organization" class="form-control"
                                                    id="organization" value="{{ old('organization') }}"
                                                    placeholder="Company/ Organization">
                                                @error('organization')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="fullName" class="form-control" id="fullName"
                                                    value="{{ old('fullName') }}" placeholder="Full Name">
                                                @error('fullName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    value="{{ old('email') }}" placeholder="Email Address">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="tel" name="phone" class="form-control" id="phone"
                                                    value="{{ old('phone') }}" placeholder="Enter phone Number">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"><i
                                                    class="fa fa-file-pdf-o"></i> Download PDF</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                </div>
                @endif
                <a href="{{ route('contactUs') }}" class="col-md-2 col-sm-12 col-12 btn btn-secondary ms-2" >Send Enquery</a>
            </div>
    </div>
    </section>


    </div>



@endsection
