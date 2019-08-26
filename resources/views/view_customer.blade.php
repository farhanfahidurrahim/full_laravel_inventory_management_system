@extends('layouts.app')
@section('content')

<div class="content-page">
    <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">It</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <!-- Basic example -->
                    	<div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                               <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
                                <div class="panel-body">
                            		
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <p>{{ $vw_cust->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <p>{{ $vw_cust->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <p>{{ $vw_cust->phone }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <p>{{ $vw_cust->address }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Shop Name</label>
                                            <p>{{ $vw_cust->shopname }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Holder</label>
                                            <p>{{ $vw_cust->account_holder }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <p>{{ $vw_cust->account_number }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Branch</label>
                                            <p>{{ $vw_cust->bank_branch }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Name</label>
                                            <p>{{ $vw_cust->bank_name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <p>{{ $vw_cust->city }}</p>
                                        </div>
                                       <div class="form-group">
                                       		<img style="height: 80px; width: 80px;" src="{{ URL::to($vw_cust->photo) }}" />
                                            <label for="exampleInputPassword1">Photo</label>
                                        </div>

                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
                </div> 
                <!-- End row-->
            </div> <!-- container -->
                               
    </div> <!-- content -->
</div>

@endsection