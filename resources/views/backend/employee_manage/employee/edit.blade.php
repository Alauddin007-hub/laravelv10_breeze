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

                            <form class="custom-validation" action="{{route('employee.update',$employees->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="{{$employees->firstname ? $employees->firstname : old('firstname') }}" required placeholder="Type something" />
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="{{$employees->lastname ? $employees->lastname : old('lastname') }}" required placeholder="Type something" />
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <div>
                                        <input type="email" class="form-control" name="email" value="{{$employees->email ? $employees->email : old('email') }}" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" name="phone" value="{{$employees->phone ? $employees->phone : old('phone') }}" class="form-control" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="department" title="Select Department">
                                    <option disabled selected>Selected once</option>
                                        @if(!empty($departments->count()))
                                        @foreach($departments as $department)
                                        <option value="{{$department->id}}" @selected(old('department', $employees->department_id) == $department->id) >{{$department->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="designation" title="Select Department">
                                    <option disabled selected>Selected once</option>
                                        @if(!empty($designations->count()))
                                        @foreach($designations as $designations)
                                        <option value="{{$designations->id}}" @selected(old('designation', $employees->designation_id) == $designations->id) >{{$designations->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Joining Date</label>
                                    <div>
                                        <input data-parsley-type="number" type="date" name="Joining_date" class="form-control" value="{{$employees->Joining_date ? $employees->Joining_date : old('Joining_date') }}" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" name="company" value="{{$employees->company ? $employees->company : old('company') }}" required placeholder="Type something" />
                                </div>
                                <div class="form-group">
                                    <label>Photo Uploade</label>
                                    <div>
                                    <img src="{{asset('storage/employees/'.$employees->image)}}" width="60px" height="50px" alt="">
                                    <input type="file" class="form-control" name="avatar" multiple="multiple">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Update
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