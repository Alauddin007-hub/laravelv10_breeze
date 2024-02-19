
@extends('backend.layouts.exportmaster')
@section('content')
    <!-- Page Wrapper -->
    <div class="">
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" id="app">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col" style="margin-left: -222px;">
                        <h3 class="page-title">Payslip</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payslip</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
<<<<<<< HEAD
                            <button class="btn btn-white" style="color: green"><i class="fa fa-file-excel-o"></i><a href=""> Excel</a></button>
                            <button class="btn btn-white" style="color: red"><i class="fa fa-file-pdf-o"></i> <a href="">PDF</a></button>
                            <button class="btn btn-white" style="color: black"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button>
=======
                            <!-- <button class="btn btn-white" style="color: green"><i class="fa fa-file-excel-o"></i><a href="{{ url("extra/report/excel/?user_id=$users->user_id") }}"> Excel</a></button> -->
                            <!-- <button class="btn btn-white" style="color: red"><i class="fa fa-file-pdf-o"></i> <a href="{{ url("extra/report/pdf/?user_id=$users->user_id") }}">PDF</a></button> -->
                            <!-- <button class="btn btn-white" style="color: black"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button> -->
>>>>>>> 02e7ed1d90121aef2fccc4faf9fe63ec755cd559
                        </div>
                    </div>
                </div>
           
            <div class="row" style="margin-left: -240px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }}   {{ \Carbon\Carbon::now()->year }}  </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
<<<<<<< HEAD
                                    
                                    <img src="" class="inv-logo" alt="">
                                    
                                    <ul class="list-unstyled mb-0">
                                        <li></li>
                                        <li></li>
                                        <li></li>
=======
                                    <!-- @if(!empty($users->avatar))
                                    <img src="{{ URL::to('/assets/images/'. $users->avatar) }}" class="inv-logo" alt="{{ $users->name }}">
                                    @endif -->
                                    <ul class="list-unstyled mb-0">
                                        <!-- <li>{{ $users->name }}</li>
                                        <li>{{ $users->address }}</li>
                                        <li>{{ $users->country }}</li> -->
>>>>>>> 02e7ed1d90121aef2fccc4faf9fe63ec755cd559
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Payslip #49029</h3>
                                        <ul class="list-unstyled">
                                            <li>Salary Month: <span>{{ \Carbon\Carbon::now()->format('M') }}  , {{ \Carbon\Carbon::now()->year }}  </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
<<<<<<< HEAD
                                        <li><h5 class="mb-0"><strong></strong></h5></li>
                                        <li><span></span></li>
                                        <li>Employee ID: </li>
                                        <li>Joining Date: </li>
=======
                                        <!-- <li><h5 class="mb-0"><strong>{{ $users->name }}</strong></h5></li>
                                        <li><span>{{ $users->position }}</span></li>
                                        <li>Employee ID: {{ $users->user_id }}</li>
                                        <li>Joining Date: {{ $users->join_date }}</li> -->
>>>>>>> 02e7ed1d90121aef2fccc4faf9fe63ec755cd559
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    // $a =  (int)$users->basic;
                                                    // $b =  (int)$users->hra;
                                                    // $c =  (int)$users->conveyance;
                                                    // $e =  (int)$users->allowance;
                                                    // $Total_Earnings   = $a + $b + $c + $e;
                                                ?>
                                                <tr>
                                                    <td><strong>Basic Salary</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Conveyance</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Other Allowance</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Earnings</strong> <span class="float-right"><strong>$ <?php //echo $Total_Earnings ?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    // $a =  (int)$users->tds;
                                                    // $b =  (int)$users->prof_tax;
                                                    // $c =  (int)$users->esi;
                                                    // $e =  (int)$users->labour_welfare;
                                                    // $Total_Deductions   = $a + $b + $c + $e;
                                                ?>
                                                <tr>
                                                    <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Provident Fund</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>ESI</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Loan</strong> <span class="float-right">$</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-right"><strong>$<?php //echo $Total_Deductions;?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <p><strong>Net Salary: $</strong> (Fifty nine thousand six hundred and ninety eight only.)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    </div>
@endsection
