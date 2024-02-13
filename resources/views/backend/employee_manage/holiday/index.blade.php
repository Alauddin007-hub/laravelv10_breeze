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
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a>Leave Management</li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Public Holidays</a></li>
                                <li class="breadcrumb-item active">Public Holidays list</li>
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
                                <a href="{{route('holidays.create')}}" class="btn btn-success fa fa-plus"> Add Public Holiday</a>
                            </div><br>

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Title </th>
                                        <th>Holiday Date</th>
                                        <th>Day</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (!empty($holidays->count()))
                                    @foreach ($holidays as $holiday)
                                    <tr class="@if($holiday->completed) holiday-completed @endif holiday-upcoming">
                                        <td>{{$holiday->name}}</td>
                                        <td>{{date_format(date_create($holiday->holiday_date),'d M Y')}}</td>
                                        <td>{{ date_format(date_create($holiday->holiday_date),'D') }}</td>
                                        <td>
                                        @if(!$holiday->completed)
                                                <form action="{{route('completed',$holiday)}}" method="post">
                                                    @csrf
                                                    <button data-id="{{$holiday->id}}" class="dropdown-item btn mark_as_complete" type="submit"><i class="fa fa-star m-r-5"></i>Completed</button>
                                                    <input type="hidden" id="complete_id" name="id">
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary" href=""><i class="bi bi-pencil-square">Edit</i></a>

                                            <a class="btn btn-danger" href="" onclick="return confirm('Are you sure to delete')"><i class="bi bi-trash">Delete</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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