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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Salary Calculation</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Salary</a></li>
                                <li class="breadcrumb-item active">Employee Grose Salary</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Emplyee Entry</h4>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                                @endforeach
                            </div>
                            @endif

                            <form class="custom-validation" action="{{route('salary.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                
                                <div class="form-group">
                                    <label>Employee <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="employee_id" title="Select Department">
                                        <option disabled selected>Selected once</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Basic Salary</label>
                                    <input type="text" class="form-control" name="basic" required placeholder="Type something" />
                                </div>
                                
                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

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