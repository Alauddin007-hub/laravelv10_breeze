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
                            <button class="btn btn-white" style="color: green"><i class="fa fa-file-excel-o"></i><a href="{{url("extra/report/excel/? id=$payrolles->id")}}"> Excel</a></button>
                            <button class="btn btn-white" style="color: red"><i class="fa fa-file-pdf-o"></i> <a href="{{url("extra/report/pdf/? id=$payrolles->id")}}">PDF</a></button>
                            <button class="btn btn-white" style="color: black"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button>
                            <!-- <button class="btn btn-white" style="color: green"><i class="fa fa-file-excel-o"></i><a href="{{ url("extra/report/excel") }}"> Excel</a></button>
                            <button class="btn btn-white" style="color: red"><i class="fa fa-file-pdf-o"></i> <a href="{{ url("extra/report/pdf/") }}">PDF</a></button>
                            <button class="btn btn-white" style="color: black"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button> -->
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-left: -240px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="payslip-title">Payslip for the month of {{ $payrolles->month_of_salary }} {{ \Carbon\Carbon::now()->year }} </h4>
                                <div class="row">
                                    <div class="col-sm-6 m-b-20">

                                        <img src="" class="inv-logo" alt="">

                                        <ul class="list-unstyled mb-0">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            @if(!empty($employees->image))
                                            <img src="{{ URL::to('storage/employees/'.$employees->image) }}" class="inv-logo" alt="{{ $employees->firstname }}">
                                            @endif
                                            <ul class="list-unstyled mb-0">
                                                <li>Name: {{$employees->firstname}} {{$employees->lastname}}</li>
                                                <li>Phone: {{$employees->phone}}</li>
                                                <li>Address: </li>
                                            </ul>
                                    </div>
                                    <div class="col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Payslip {{ $payrolles->slipID }}</h3>
                                            <ul class="list-unstyled">
                                                <li>Salary Month: <span>{{ $payrolles->month_of_salary }}, {{ \Carbon\Carbon::now()->year }}</span></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 m-b-20">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5 class="mb-0"><strong></strong></h5>
                                            </li>
                                            <li><span></span></li>
                                            <li>Employee ID: {{$employees->uuid}} </li>
                                            <li>Joining Date: {{$employees->joining_date}}</li>

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
                                                    $a =  (int)$payrolles->dine_allowance;
                                                    $b =  (int)$payrolles->allowance;
                                                    $c =  (int)$payrolles->medical_allowance;
                                                    // $e =  (int)$users->allowance;
                                                    $other_allowance   = $a + $b + $c;
                                                    ?>
                                                    <tr>
                                                        <td><strong>Basic Salary</strong> <span class="float-right">{{$payrolles->basic}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">{{$payrolles->rent_allowance}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Conveyance</strong> <span class="float-right">{{$payrolles->conveneynce_allowance}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Other Allowance</strong> <span class="float-right">{{$other_allowance}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Earnings</strong> <span class="float-right"><strong>{{$payrolles->gross_salary}} tk</strong></span></td>
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
                                                    $a =  (int)$payrolles->tds;
                                                    $b =  (int)$payrolles->pf;
                                                    $c =  (int)$payrolles->leave;
                                                    $d =  (int)$payrolles->loan;
                                                    $e =  (int)$payrolles->esi;
                                                    $f =  (int)$payrolles->prof_tax;

                                                    $other = $e + $f;

                                                    $Total_Deductions   = $a + $b + $c + $d + $other;

                                                    ?>
                                                    <tr>
                                                        <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">{{$payrolles->tds}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Provident Fund</strong> <span class="float-right">{{$payrolles->pf}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Leave</strong> <span class="float-right">{{$payrolles->leave}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Loan</strong> <span class="float-right">{{$payrolles->loan}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Other</strong> <span class="float-right">{{$other}} tk</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Deductions</strong> <span class="float-right"><strong>{{$Total_Deductions}} tk</strong></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p><strong>Net Salary: {{$payrolles->net_salary}} tk</strong> ( {{$spell}} only.)</p>
                                        @php
                                        //echo $spell;
                                        //echo $salary;
                                        @endphp
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