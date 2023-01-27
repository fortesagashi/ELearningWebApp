<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Qendra Burimore për Mësim dhe Këshillim "Xheladin Deda"</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/images/logo-light.png')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Toastr Css -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" >
    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png')}}" height="70" class="logo-dark mx-auto" alt="">
                                </a>
                            </div>
                        </div>


                        <div class="p-1">
                            <form method="POST" id="myForm" class="form-horizontal mt-3" action="{{ route('teacher.login') }}">
                            @csrf

                                <h5 class="text-muted text-center font-size-18">Qendra Burimore për Mësim dhe Këshillim “Xheladin Deda”</h5><br>
                                <div class="form-group mb-3 row">

                                    <div class="col-12">
                                        <input class="form-control" id="email" type="text" name="email" required="" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                <br>
                                <div class="col-12">
                                        <input class="form-control form-control:focus" id="password" type="password" name="password" required="" placeholder="Fjalëkalimi">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-1 text-center row mt-1 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Kyçu</button>
                                    </div>
                                </div>

                                <div class="form-group mb-1 text-center row mt-1 pt-1">
                                    <div class="col-12">
                                        <a href="{{ route('password.request') }}" class="btn btn-info w-100 waves-effect waves-light">Ndrysho fjalëkalimin</a>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">
                                        <a href="{{ route('teacher_login_form') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Kyçu mësues</a>
                                    </div>
                                    <div class="col-sm-5 mt-3 ps-4">
                                        <a href="{{ route('admin_login_form') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Kyçu administrator</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{ asset('backend/assets/js/app.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
        </script>

    </body>
</html>
