<header class="main-header header-style-three">

    <!-- header-bottom -->
    <div class="header-bottom" style="background-color: white">
        <div class="container-fluid" style="position: fixed;background-color: #ffffff">
            <div class="nav-outer">
                <div class="logo-box" style="margin-left: 10px">
                    <figure class="logo-outer"><a href="{{ route('mainHome') }}"><img src="{{ asset('temp/images/small-logo.png') }}" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu navbar-expand-lg" >
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">


                                @if ( Request::is('/'))

                                <li class="current"><a href="{{ route('mainHome') }}">Home</a></li>
                            @else

                                <li><a href="{{ route('mainHome') }}">Home</a></li>

                            @endif
                            @if (Request::is('aboutUs'))
                                <li class="current"><a href="{{ route('aboutUs') }}">About Us</a></li>
                            @else
                                <li><a href="{{ route('aboutUs') }}">About Us</a></li>

                            @endif

                            @if (Request::is('categoryItem'))
                            <li class="dropdown current"><a href="#">Products</a>
                                <ul>
                                    @if(count($departments) > 0)
                                        @foreach ($departments as $departments)
                                        <li><a href="{{ route('department.show',["id"=>$department->id]) }}">{!! $department->title !!}</a></li>

                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            @else
                            <li class="dropdown"><a href="#">Products</a>
                                <ul>

                                        <li><a href="#">title</a></li>


                                </ul>
                            </li>
                            @endif
                            {{-- <li><a href="{{ route('globalPartener') }}">Parteners</a>

                            </li> --}}
                            @if (Request::is('globalPartener'))
                                <li class="current"><a href="{{ route('globalPartener') }}">Parteners</a></li>
                            @else
                                <li><a href="{{ route('globalPartener') }}">Parteners</a></li>

                            @endif
                            {{-- <li><a href="{{ route('eventNews') }}">Events</a></li> --}}
                            @if (Request::is('eventNews'))
                                <li class="current"><a href="{{ route('eventNews') }}">Events</a></li>
                            @else
                                <li><a href="{{ route('eventNews') }}">Events</a></li>

                            @endif
                            {{-- <li><a href="{{ route('contactUs') }}">Contact Us</a></li> --}}
                            @if (Request::is('contactUs'))
                                <li class="current"><a href="{{ route('contactUs') }}">Contact Us</a></li>
                            @else
                                <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                            @endif
                                <li style="margin-right: 10px;margin-top: 5px">
                                    <form action="{{ route('search.product') }}" method="POST" class="search-form">
                                        @csrf
                                        <div class="">
                                            <input type="search" id="search_product" name="product_name" placeholder="Search..." required="">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>



                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div><!-- header-bottom end -->


    <!--Sticky Header-->

</header>
