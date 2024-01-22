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

                            <h4 class="header-title">Buttons example</h4>
                            <div>
                                <a href="{{route('designation.create')}}" class="btn btn-success fa fa-plus"> Add Employee</a>
                            </div><br>
                            
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>created_at</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($designations as $designation)
                                    <tr>
                                        <td>{{$designation->id}}</td>
                                        <td>{{$designation->name}}</td>
                                        <td>{{$designation->department->name}}</td>
                                        <td>{{$designation->created_at}}</td>
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