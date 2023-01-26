<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>"Xheladin Deda"</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="{{ asset('student/assets/img/favicon.png')}}" rel="shortcut icon">
      <link href="{{ asset('student/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="{{ asset('student/assets/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/bootstrap.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/quill.snow.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/quill.bubble.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/remixicon.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/simple-datatables.css')}}" rel="stylesheet">
      <link href="{{ asset('student/assets/css/style.css')}}" rel="stylesheet">

   </head>
   <body>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <script src="{{ asset('student/assets/js/apexcharts.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/chart.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/echarts.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/quill.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/simple-datatables.js')}}"></script>
        <script src="{{ asset('student/assets/js/tinymce.min.js')}}"></script>
        <script src="{{ asset('student/assets/js/validate.js')}}"></script>
        <script src="{{ asset('student/assets/js/main.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <div>


            @include('student.body.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('student.body.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <main id="main" class="main">
            <div class="page-content" style="padding:20px; min-height:505px;">
                @yield('student')
                <!-- End Page-content -->
                @yield('chapter_content')
                </div>
                @include('student.body.footer')


</main>
            <!-- end main content-->

        </div>
   </body>
</html>
