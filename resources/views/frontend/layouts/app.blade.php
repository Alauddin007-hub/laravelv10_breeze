<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="frontend/assets/imgs/template/favicon.svg">
    <link href="frontend/assets/css/style.css?version=4.1" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="frontend/assets/imgs/template/loading.gif" alt="jobBox"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content apply-job-form">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body pl-30 pr-30 pt-50">
                    <div class="text-center">
                        <p class="font-sm text-brand-2">Job Application </p>
                        <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                        <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer. </p>
                    </div>
                    <form class="login-register text-start mt-20 pb-30" action="#">
                        <div class="form-group">
                            <label class="form-label" for="input-1">Full Name *</label>
                            <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="input-2">Email *</label>
                            <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="number">Contact Number *</label>
                            <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="des">Description</label>
                            <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="file">Upload Resume</label>
                            <input class="form-control" id="file" name="resume" type="file">
                        </div>
                        <div class="login_footer form-group d-flex justify-content-between">
                            <label class="cb-container">
                                <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                            </label><a class="text-muted" href="page-contact.html">Lean more</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
                        </div>
                        <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact Us</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
    <script src="frontend/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="frontend/assets/js/plugins/waypoints.js"></script>
    <script src="frontend/assets/js/plugins/wow.js"></script>
    <script src="frontend/assets/js/plugins/magnific-popup.js"></script>
    <script src="frontend/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="frontend/assets/js/plugins/select2.min.js"></script>
    <script src="frontend/assets/js/plugins/isotope.js"></script>
    <script src="frontend/assets/js/plugins/scrollup.js"></script>
    <script src="frontend/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="frontend/assets/js/plugins/counterup.js"></script>
    <script src="frontend/assets/js/main.js?v=4.1"></script>
</body>

</html>