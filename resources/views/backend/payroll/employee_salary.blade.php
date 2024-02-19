@extends ('backend.layouts.app')

@section('content')
{{-- message --}}

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Employee Salary <span id="year"></span></h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Salary</li>
                                </ul>
                            </div>
                            <div class="col-auto float-right ml-auto">
                                <a href="#" class="btn add-btn btn-info" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                            </div>
                        </div>
                    </div>

                    <!-- Search Filter -->
                    
                    <!-- /Search Filter -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table datatable" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Employee ID</th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th hidden></th>
                                            <th>Email</th>
                                            <th>Join Date</th>
                                            <th>Role</th>
                                            <th>Salary</th>
                                            <th hidden></th>
                                            <th>Payslip</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar"><img alt="" src=""></a>
                                                    <a href=""><span></span></a>
                                                </h2>
                                            </td>
                                            <td></td>
                                            <td hidden class="id"></td>
                                            <td hidden class="name"></td>
                                            <td hidden class="basic"></td>
                                            <td hidden class="da"></td>
                                            <td hidden class="hra"></td>
                                            <td hidden class="conveyance"></td>
                                            <td hidden class="allowance"></td>
                                            <td hidden class="medical_allowance"></td>
                                            <td hidden class="tds"></td>
                                            <td hidden class="esi"></td>
                                            <td hidden class="pf"></td>
                                            <td hidden class="leave"></td>
                                            <td hidden class="prof_tax"></td>
                                            <td hidden class="labour_welfare"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td hidden class="salary"></td>
                                            <td><a class="btn btn-sm btn-primary" href="{{ url('salary/view') }}" target="_blank">Generate Slip</a></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item userSalary" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item salaryDelete" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Page Content -->

                <!-- Add Salary Modal -->
                <div id="add_salary" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Staff Salary</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Staff</label>
                                                <select class="select select2s-hidden-accessible @error('name') is-invalid @enderror" style="width: 100%;" tabindex="-1" aria-hidden="true" id="name" name="name">
                                                    <option value="">-- Select --</option>

                                                    <option value="" data-employee_id=></option>

                                                </select>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <input class="form-control" type="hidden" name="user_id" id="employee_id" readonly>
                                        <div class="col-sm-6">
                                            <label>Net Salary</label>
                                            <input class="form-control @error('salary') is-invalid @enderror" type="number" name="salary" id="salary" value="{{ old('salary') }}" placeholder="Enter net salary">
                                            @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-primary">Earnings</h4>
                                            <div class="form-group">
                                                <label>Basic</label>
                                                <input class="form-control @error('basic') is-invalid @enderror" type="number" name="basic" id="basic" value="{{ old('basic') }}" placeholder="Enter basic">
                                                @error('basic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>DA(40%)</label>
                                                <input class="form-control @error('da') is-invalid @enderror" type="number" name="da" id="da" value="{{ old('da') }}" placeholder="Enter DA(40%)">
                                                @error('da')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>HRA(15%)</label>
                                                <input class="form-control @error('hra') is-invalid @enderror" type="number" name="hra" id="hra" value="{{ old('hra') }}" placeholder="Enter HRA(15%)">
                                                @error('hra')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Conveyance</label>
                                                <input class="form-control @error('conveyance') is-invalid @enderror" type="number" name="conveyance" id="conveyance" value="{{ old('conveyance') }}" placeholder="Enter conveyance">
                                                @error('conveyance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Allowance</label>
                                                <input class="form-control @error('allowance') is-invalid @enderror" type="number" name="allowance" id="allowance" value="{{ old('allowance') }}" placeholder="Enter allowance">
                                                @error('allowance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Medical Allowance</label>
                                                <input class="form-control @error('medical_allowance') is-invalid @enderror" type="number" name="medical_allowance" id="medical_allowance" value="{{ old('medical_allowance') }}" placeholder="Enter medical  allowance">
                                                @error('medical_allowance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="text-primary">Deductions</h4>
                                            <div class="form-group">
                                                <label>TDS</label>
                                                <input class="form-control @error('tds') is-invalid @enderror" type="number" name="tds" id="tds" value="{{ old('tds') }}" placeholder="Enter TDS">
                                                @error('tds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>ESI</label>
                                                <input class="form-control @error('esi') is-invalid @enderror" type="number" name="esi" id="esi" value="{{ old('esi') }}" placeholder="Enter ESI">
                                                @error('esi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>PF</label>
                                                <input class="form-control @error('pf') is-invalid @enderror" type="number" name="pf" id="pf" value="{{ old('pf') }}" placeholder="Enter PF">
                                                @error('pf')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Leave</label>
                                                <input class="form-control @error('leave') is-invalid @enderror" type="text" name="leave" id="leave" value="{{ old('leave') }}" placeholder="Enter leave">
                                                @error('leave')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Prof. Tax</label>
                                                <input class="form-control @error('prof_tax') is-invalid @enderror" type="number" name="prof_tax" id="prof_tax" value="{{ old('prof_tax') }}" placeholder="Enter Prof. Tax">
                                                @error('prof_tax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Loan</label>
                                                <input class="form-control @error('labour_welfare') is-invalid @enderror" type="number" name="labour_welfare" id="labour_welfare" value="{{ old('labour_welfare') }}" placeholder="Enter Loan">
                                                @error('labour_welfare')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Salary Modal -->

                <!-- Edit Salary Modal -->
                <div id="edit_salary" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Staff Salary</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <input class="form-control" type="hidden" name="id" id="e_id" value="" readonly>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name Staff</label>
                                                <input class="form-control " type="text" name="name" id="e_name" value="" readonly>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Net Salary</label>
                                            <input class="form-control" type="text" name="salary" id="e_salary" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-primary">Earnings</h4>
                                            <div class="form-group">
                                                <label>Basic</label>
                                                <input class="form-control" type="text" name="basic" id="e_basic" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>DA(40%)</label>
                                                <input class="form-control" type="text" name="da" id="e_da" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>HRA(15%)</label>
                                                <input class="form-control" type="text" name="hra" id="e_hra" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Conveyance</label>
                                                <input class="form-control" type="text" name="conveyance" id="e_conveyance" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Allowance</label>
                                                <input class="form-control" type="text" name="allowance" id="e_allowance" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Medical Allowance</label>
                                                <input class="form-control" type="text" name="medical_allowance" id="e_medical_allowance" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="text-primary">Deductions</h4>
                                            <div class="form-group">
                                                <label>TDS</label>
                                                <input class="form-control" type="text" name="tds" id="e_tds" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>ESI</label>
                                                <input class="form-control" type="text" name="esi" id="e_esi" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>PF</label>
                                                <input class="form-control" type="text" name="pf" id="e_pf" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Leave</label>
                                                <input class="form-control" type="text" name="leave" id="e_leave" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Prof. Tax</label>
                                                <input class="form-control" type="text" name="prof_tax" id="e_prof_tax" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Loan</label>
                                                <input class="form-control" type="text" name="labour_welfare" id="e_labour_welfare" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Edit Salary Modal -->

                <!-- Delete Salary Modal -->
                <div class="modal custom-modal fade" id="delete_salary" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Delete Salary</h3>
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="hidden" name="id" class="e_id" value="">
                                                <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                            </div>
                                            <div class="col-6">
                                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete Salary Modal -->

            </div>
            <!-- /Page Wrapper -->
        </div>
    </div>
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
@section('script')
<script>
    $(document).ready(function() {
        $('.select2s-hidden-accessible').select2({
            closeOnSelect: false
        });
    });
</script>
<script>
    // select auto id and email
    $('#name').on('change', function() {
        $('#employee_id').val($(this).find(':selected').data('employee_id'));
    });
</script>
{{-- update js --}}
<script>
    $(document).on('click', '.userSalary', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#e_name').val(_this.find('.name').text());
        $('#e_salary').val(_this.find('.salary').text());
        $('#e_basic').val(_this.find('.basic').text());
        $('#e_da').val(_this.find('.da').text());
        $('#e_hra').val(_this.find('.hra').text());
        $('#e_conveyance').val(_this.find('.conveyance').text());
        $('#e_allowance').val(_this.find('.allowance').text());
        $('#e_medical_allowance').val(_this.find('.medical_allowance').text());
        $('#e_tds').val(_this.find('.tds').text());
        $('#e_esi').val(_this.find('.esi').text());
        $('#e_pf').val(_this.find('.pf').text());
        $('#e_leave').val(_this.find('.leave').text());
        $('#e_prof_tax').val(_this.find('.prof_tax').text());
        $('#e_labour_welfare').val(_this.find('.labour_welfare').text());
    });
</script>
{{-- delete js --}}
<script>
    $(document).on('click', '.salaryDelete', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
</script>
@endsection
@endsection