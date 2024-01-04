@extends('backend.layouts.app')

@section('title','All Categories')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">All Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category List</h5>
                        @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Created At</th>
                                    <th>updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->created_at}}</td>
                                    <td>{{$cat->updated_at}}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="category/edit/{{$cat->id}}"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" href="category/delete/{{$cat->id}}"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection