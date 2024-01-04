@extends('backend.layouts.app')

@section('title','Caregory Entry')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Entry</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{ route('category.update', ['id' => $cat['id']]) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{old('name')? old('name'):$cat['name']}}">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            
        </div>
    </section>

</main><!-- End #main -->

@endsection