@extends ('backend.layouts.app')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Branch</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Branch List</a></li>
                                <li class="breadcrumb-item active">Branches</li>
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

                            <h4 class="header-title">Buttons example</h4>
                            <div>
                                <a href="{{URL('payrolls')}}" class="btn btn-success fa fa-plus"> Add Employee salary</a>
                            </div><br>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Employee</th>
                                        <th>Joining Date</th>
                                        <th>Month Of Salary</th>
                                        <th>Basic Salary</th>
                                        <th>Net Salary</th>
                                        <th>Payslip</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($payrolles as $key=>$item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                        <div class="table-avatar">
                                                <a href="javascript:void(0)" class="avatar"><img alt="avatar" src="{{asset('storage/employees/'.$item->employee->image)}}" width="50px" height="50px"></a>
                                                <a href="javascript:void(0)">{{$item->employee->firstname}} {{$item->employee->lastname}}</a>
                                            </div>
                                        </td>
                                        <td>{{$item->employee->joining_date}}</td>
                                        <td>{{$item->month_of_salary}}</td>
                                        <td>{{$item->basic}}</td>
                                        <td>{{$item->net_salary}}</td>
                                        <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('salaryViews',$item->id)}}" target="_blank">Generate Slip</a>
                                        </td>
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item userSalary" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item salaryDelete" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
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