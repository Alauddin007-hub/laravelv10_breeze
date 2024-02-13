@extends ('backend.layouts.app')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Data Tables</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Management</a></li>
                                <li class="breadcrumb-item active">Employees</li>
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
                                <a href="{{route('termination')}}" class="btn btn-success fa fa-plus"> Terminate Employee</a>
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
                                        <th>Termination Type</th>
                                        <th>Subject</th>
                                        <th>Terminated By</th>
                                        <th>Notice Date</th>
                                        <th>Terminated Date</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <!-- 'employee_id','termination_type','subject','role_type_id','notice_date','terminated_date','discription', -->

                                <tbody>
                                    @foreach($terminates as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->employee->firstname}}</td>
                                        <td>{{$item->termination_type}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->role_type_id}}</td>
                                        <td>{{$item->notice_date}}</td>
                                        <td>{{$item->terminated_date}}</td>
                                        <td>{{$item->discription}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>Edit</td>
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