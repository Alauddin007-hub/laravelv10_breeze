@extends ('backend.layouts.app')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Admin</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Salary Calculation</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a>Employee Salary</li>
                                <li class="breadcrumb-item active">Grose Salary</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Default Datatable</h4>
                            <div>
                                <a href="{{route('salaryAdd')}}" class="btn btn-success fa fa-plus">Employee Salary</a>
                            </div>

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Employee</th>
                                        <th>Basic Salary</th>
                                        <th>Daily Rate</th>
                                        <th>Hourly Rate</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($em_salaries as $key=>$item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->employee->firstname}}</td>
                                        <td>{{$item->basic}}</td>
                                        <td>{{$item->daily_rate}}</td>
                                        <td>{{$item->hourly_rate}}</td>

                                        <!-- <td>{{$item->conveneynce_allowance}}</td>
                                        <td>{{$item->madical_allowance}}</td>
                                        <td>{{$item->rent_allowance}}</td>
                                        <td>{{$item->gross_salary}}</td> -->
                                        <td>Edit | Delete</td>

                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    2022 © Apaxy.
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