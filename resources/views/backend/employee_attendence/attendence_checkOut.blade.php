<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Apaxy - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('')}}assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
    <div class="home-btn d-none d-sm-block">
        <a href="#"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Attendence</h5>
                               
                                <form class="form-horizontal" method="POST" action="{{ route('attendence.update')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">

                                        

                                            <div class="form-group mb-4">
                                                <label>Employee Name <span class="text-danger">*</span></label>
                                                <select class="custom-select" name="employee_id" title="Select Department">
                                                    <option disabled selected>Selected once</option>
                                                   
                                                    @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->firstname}}  {{$employee->lastname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="term-conditionCheck" checked required>
                                                <label class="custom-control-label font-weight-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                            </div>
                                            <!-- <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Check In</button>
                                            </div> -->

                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Check Out</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <a href="auth-login.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    

    <!-- JAVASCRIPT -->
    <script src="{{asset('')}}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('')}}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('')}}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('')}}assets/libs/node-waves/waves.min.js"></script>

    <script src="{{asset('')}}assets/js/app.js"></script>


    <!-- jquery -->
    <script>
        //  $("").on('', function (){

        //  });
    </script>

</body>

</html>