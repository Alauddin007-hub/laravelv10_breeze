@extends('backend.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">HRM</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="font-size-14">Number of Employee</h5>
                                </div>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <!-- <i class="dripicons-box"></i> -->
                                        <i class="mdi mdi-account-group"></i>
                                    </span>
                                </div>
                            </div>
                            <h4 class="m-0 align-self-center">1,753</h4>
                            <p class="mb-0 mt-3 text-muted"><span class="text-success">1.23 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="font-size-14">Sales Revenue</h5>
                                </div>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="dripicons-briefcase"></i>
                                    </span>
                                </div>
                            </div>
                            <h4 class="m-0 align-self-center">$45,253</h4>
                            <p class="mb-0 mt-3 text-muted"><span class="text-success">2.73 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="font-size-14">Average Price</h5>
                                </div>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="dripicons-tags"></i>
                                    </span>
                                </div>
                            </div>
                            <h4 class="m-0 align-self-center">$12.74</h4>
                            <p class="mb-0 mt-3 text-muted"><span class="text-danger">4.35 % <i class="mdi mdi-trending-down mr-1"></i></span> From previous period</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="font-size-14">Product Sold</h5>
                                </div>
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="dripicons-cart"></i>
                                    </span>
                                </div>
                            </div>
                            <h4 class="m-0 align-self-center">20,781</h4>
                            <p class="mb-0 mt-3 text-muted"><span class="text-success">7.21 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    2022 © HRM System.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection