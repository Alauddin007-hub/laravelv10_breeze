@extends('backend.layouts.app')

@section('title','All Products')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">All Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product List</h5>

                        @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <!--   	 	 	 	 	 -->
                                <tr>
                                    <th>#id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>category_id</th>
                                    <th>created_at</th>
                                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                    <th>updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <img src="{{asset('upload/'.$product->img)}}" width="60px" height="50px" alt="">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->updated_at}}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="product/edit/{{$product->id}}"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" href="product/delete/{{$product->id}}"><i class="bi bi-trash-fill"></i></a>
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