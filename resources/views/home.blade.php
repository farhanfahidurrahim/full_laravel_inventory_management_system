@extends('layouts.app')
@section('content')

@php
    
    $total_pay=DB::table('orders')->select('pay')->sum('pay');
    $total_due=DB::table('orders')->select('due')->sum('due');
    $total_sales=DB::table('orderdetails')->select('total')->sum('total');
    $total_products=DB::table('orderdetails')->select('quantity')->sum('quantity');
    
@endphp
<div class="content-page">
    <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-4">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$total_pay}}</span>
                                Total Pay 
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Today Pay <span class="pull-right"></span></h5>
                                    {{-- <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-4">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$total_due}}</span>
                                Total Due 
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Today Due <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-4">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$total_sales}}</span>
                                Total Sales 
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Sales <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-6 col-lg-4"></div>
                    <div class="col-md-12 col-sm-6 col-lg-4">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$total_products}}</span>
                                Total Sell Order Products
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Total Sell Order Products <span class="pull-right">60%</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <!-- End row-->
            </div> <!-- container -->
                               
    </div> <!-- content -->
</div>
@endsection
