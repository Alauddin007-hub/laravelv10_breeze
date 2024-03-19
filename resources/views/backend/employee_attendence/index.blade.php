@extends ('backend.layouts.app')

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Management</a></li>
                                <li class="breadcrumb-item active">Employee List</li>
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

                            <h4 class="header-title">Employee List</h4>
                            <div>
                                <a href="{{route('employee.attendence')}}" class="btn btn-success fa fa-plus">Attendence</a>
                            </div><br>
                            
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Employee</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th class="text-nowrap"> Date</th>
                                        <th>Total Work Wours</th>
                                        <th class="text-right no-sort">Status</th>
                                    </tr>
                                </thead>

                                <!-- 'employee_id','checkin','checkout', 'date', 'total_work_hours', 'status' -->
                                <tbody>
                                    @foreach ($attendances as $key=>$item)
                                    <tr>
                                    <td>{{++$key}}</td>
                                        <td>
                                            <div class="table-avatar">
                                                <a href="javascript:void(0)" class="avatar"><img alt="avatar" src="{{asset('storage/employees/'.$item->employee->image)}}" width="50px" height="50px"></a>
                                                <a href="javascript:void(0)">{{$item->employee->firstname}} {{$item->employee->lastname}}</a>
                                            </div>
                                        </td>
                                        <td>{{$item->checkin}}</td>
                                        <td>{{$item->checkout}}</td>
                                        <td>{{$item->total_work_hours}}</td>
                                        <td>{{$item->date}}</td>
                                        <!-- <td>{{date_format(date_create($item->date),"d M,Y")}}</td> -->
                                        <td>
                                            {{$item->status}}
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