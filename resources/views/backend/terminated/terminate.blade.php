@extends ('backend.layouts.app')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Form Validation</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Apaxy</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Validation</li>
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

                            <form class="custom-validation" action="{{route('tarminated.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Employee <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="employee" title="Select Department">
                                        <option disabled selected>Selected once</option>
                                        
                                        <option value=""></option>
                                        
                                    </select>
                                </div>

                                <!-- 'employee_id','termination_type','subject','role_type_id','notice_date','terminated_date','discription', -->
                                <div class="form-group">
                                    <label>termination_type</label>
                                    <input type="text" class="form-control" name="firstname" required placeholder="Type something" />
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" required placeholder="Type something" />
                                </div>

                                <div class="form-group">
                                    <label>Terminated By <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="role_type_id" title="Select Department">
                                        <option disabled selected>Selected once</option>
                                        
                                        <option value=""></option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Notice Date</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" name="notice_date" class="form-control" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Terminated Date</label>
                                    <input type="text" class="form-control" name="terminated_date" required placeholder="Type something" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <textarea class="form-control" name="discription" id="" cols="30" rows="10"></textarea>
                                        
                                    </div>
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