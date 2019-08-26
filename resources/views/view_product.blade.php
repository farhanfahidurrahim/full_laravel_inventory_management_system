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
                               <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                                <div class="panel-body">
                            		
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <p>{{ $vprod->product_name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <p>{{ $vprod->cat_id }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier Name</label>
                                            <p>{{ $vprod->sup_id }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code</label>
                                            <p>{{ $vprod->product_code }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Storage</label>
                                            <p>{{ $vprod->product_storage }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Route</label>
                                            <p>{{ $vprod->product_route }}</p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Buy Date</label>
                                            <p>{{ $vprod->buy_date }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expire Date</label>
                                            <p>{{ $vprod->expire_date }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Buying Price</label>
                                            <p>{{ $vprod->buying_price }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price</label>
                                            <p>{{ $vprod->selling_price }}</p>
                                        </div>
                                       <div class="form-group">
                                       		<img style="height: 80px; width: 80px;" src="{{ URL::to($vprod->product_image) }}" />
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