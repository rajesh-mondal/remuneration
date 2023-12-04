<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <!-- site metas -->
   <title>Remuneration</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
   <!-- site css -->
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
   <!-- responsive css -->
   <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
   <!-- color css -->
   <link rel="stylesheet" href="{{ asset('assets/css/color_2.css') }}" />
   <!-- <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" /> -->
   <!-- select bootstrap -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}" />
   <!-- toastr css -->
   <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
   <!-- datatable css -->
   <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet" />

</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         @include('partials.sidebar')
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            @include('partials.topbar')
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  @yield('content')
               </div>
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="{{ asset('assets/js/popper.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <!-- wow animation -->
   <script src="{{ asset('assets/js/animate.js') }}"></script>
   <!-- select country -->
   <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
   <!-- owl carousel -->
   <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
   <!-- nice scrollbar -->
   <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
   <!-- toaster js -->
   <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
   <!-- datatable script -->
   <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="{{ asset('assets/js/custom.js') }}"></script>
   <script>
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
   </script>
   @if(Session::has('message'))
   <script>
      var type = "{{Session::get('alert-type','info')}}"
      switch (type) {
         case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
         case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
         case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
         case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
      }
   </script>
   @endif

   @yield('script')

</body>

</html>