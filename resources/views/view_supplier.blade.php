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
                               <div class="panel-heading"><h3 class="panel-title">View Supplier</h3></div>
                                <div class="panel-body">
                            		
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <p>{{ $vsplr->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <p>{{ $vsplr->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <p>{{ $vsplr->phone }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <p>{{ $vsplr->address }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier Type</label>
                                            <p>{{ $vsplr->type }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Shop</label>
                                            <p>{{ $vsplr->shop }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Holder</label>
                                            <p>{{ $vsplr->accountholder }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <p>{{ $vsplr->accountnumber }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Branch</label>
                                            <p>{{ $vsplr->bankbranch }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Name</label>
                                            <p>{{ $vsplr->bankname }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <p>{{ $vsplr->city }}</p>
                                        </div>
                                       <div class="form-group">
                                       		<img style="height: 80px; width: 80px;" src="{{ URL::to($vsplr->photo) }}" />
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