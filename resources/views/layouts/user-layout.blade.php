<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Doors</title>

<!-- Stylesheets -->
<!-- CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('temp/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('temp/css/responsive.css') }}" rel="stylesheet">
<link rel="icon" href="{{ asset('temp/images/favicon.ico') }}" type="image/x-icon">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{ asset('temp/js/jquery.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    var availableTags = [];
    $.ajax({
      method: "GET",
      url : "/product-list",
      success: function(response){
          console.log(response);
          startAutoComplete(response)
      }
    });
    function startAutoComplete(availableTags){
      $("#search_product").autocomplete({
          source: availableTags
      });
    }
  </script>
</head>

<!-- page wrapper -->
<body class="boxed_wrapper">


    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->


    <!-- Main Header -->
    @include('layouts.navbar')
    <!-- End Main Header -->
@yield('content')

    <!--start footer -->
    @include('layouts.footer')
    <!--end footer -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-angle-up"></span>
</button>



<!-- jequery plugins -->




<script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('temp/js/popper.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('temp/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('temp/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('temp/js/wow.js') }}"></script>
<script src="{{ asset('temp/js/validation.js') }}"></script>
<script src="{{ asset('temp/js/isotope.js') }}"></script>
<script src="{{ asset('temp/js/html5lightbox/html5lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('temp/js/SmoothScroll.js') }}"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBevTAR-V2fDy9gQsQn1xNHBPH2D36kck0"></script>
<script src="{{ asset('temp/js/gmaps.js') }}"></script>
<script src="{{ asset('temp/js/map-helper.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('temp/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->
</html>
