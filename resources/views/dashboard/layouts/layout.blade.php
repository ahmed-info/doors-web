 <!DOCTYPE html>
 <html dir="rtl">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
     <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>Admin Panel</title>
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

     <style>
         .dataTables_wrapper .dataTables_paginate .paginate_button {
             padding: 0px !important;
             margin: 0px !important;
         }

         .dataTables_wrapper .dataTables_filter {
             float: left !important;
         }

         .dataTables_wrapper .dataTables_length {
             float: right !important;
         }


         div.dataTables_wrapper div.dataTables_length select {
             justify-content: space-between !important;
             /* width: 50% !important; */
         }
         table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
        text-align: right;
        }
     </style>
     <!-- Icons -->
     <link href="{{ asset('adminassets/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('adminassets/css/simple-line-icons.css') }}" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="{{ asset('adminassets/dest/style.css') }}" rel="stylesheet">
     @yield('style')

     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 </head>

 <body class="navbar-fixed sidebar-nav fixed-nav">
     <header class="navbar">
         <div class="container-fluid">


             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <a class="navbar-brand" href="#"></a>
             <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>
             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span
                             class="tag tag-pill tag-danger">5</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-list"></i></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                         aria-haspopup="true" aria-expanded="false">
                         <img src="{{ asset('adminassets/img/avatars/logo.png') }}" class="img-avatar"
                             alt="admin@bootstrapmaster.com">
                         <span class="hidden-md-down">language</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">

                         <div class="divider"></div>
                         <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                             <i class="fa fa-lock"></i>

                             logout
                         </a>


                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                 </li>

             </ul>
         </div>
     </header>
     <div class="sidebar">
         <nav class="sidebar-nav">
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard') }}"><i class="icon-speedometer"></i>لوحة التحكم<span
                             class="tag tag-info">جدید</span></a>
                 </li>

                 <li class="nav-title">
                     test header
                 </li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.category.index') }}"><i class="icon-puzzle"></i>الاقسام الرئيسية</a>
</li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.subcategory.index') }}"><i
                            class="icon-puzzle"></i>الاقسام الفرعية</a>
                </li>

                

                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.product.index') }}"><i
                             class="icon-puzzle"></i>المنتجات</a>
                 </li>

                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.slide.index') }}"><i class="icon-puzzle"></i>سلايد</a>
                </li>

                 <li class="nav-item">
                     <a class="nav-link" href="#"><i
                             class="icon-puzzle"></i>الطلبات</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-puzzle"></i>social Media</a>
                </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i
                             class="icon-puzzle"></i>Address</a>
                 </li>
             </ul>
         </nav>
     </div>
     <!-- Main content -->
     <main class="main">
         @yield('body')

     </main>

     @include('dashboard.layouts.sidebar')

     <footer class="footer">
         <span class="text-left">
             <a href="#">CoreUI</a> &copy; 2023 creativeLabs.
         </span>
         <span class="pull-right">
             Powered by <a href="">ahmed razzaq</a>
         </span>
     </footer>
     <!-- Bootstrap and necessary plugins -->
     <script src="{{ asset('adminassets/js/libs/jquery.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/tether.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/bootstrap.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/pace.min.js') }}"></script>

     <!-- Plugins and scripts required by all views -->
     <script src="{{ asset('adminassets/js/libs/Chart.min.js') }}"></script>

     <!-- CoreUI main scripts -->

     <script src="{{ asset('adminassets/js/app.js') }}"></script>

     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     <script src="{{ asset('adminassets/js/views/main.js') }}"></script>

     <!-- Grunt watch plugin -->
     <script src="//localhost:35729/livereload.js"></script>
     <script>
         $('.show_confirm').click(function(event) {
             var form = $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                     title: `Are you sure you want to delete this record?`,
                     text: "If you delete this, it will be gone forever.",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                 })
                 .then((willDelete) => {
                     if (willDelete) {
                         form.submit();
                     }
                 });
         });
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js22/bootstrap.bundle.min.js" crossorigin="anonymous">
     </script>
     <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

     <script>
         $(document).ready(function() {
             $('#myDataTable').DataTable();
         });
         //let table = new DataTable('#myTable');
     </script>
     @yield('scripts')
 </body>

 </html>
