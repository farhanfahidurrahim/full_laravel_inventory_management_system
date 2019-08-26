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
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Product</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Product Code</th>
                                                    <th>Selling Price</th>
                                                    <th>Image</th>
                                                    <th>Storage</th>
                                                    <th>Route</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	@foreach($aprdct as $row)
                                                <tr>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->product_code }}</td>
                                                    <td>{{ $row->selling_price }}</td>
                                                    <td><img src="{{ $row->product_image }}" style="height: 70px; width: 70px;"></td>
                                                    <td>{{ $row->product_storage }}</td>
                                                    <td>{{ $row->product_route }}</td>
                                                    <td>
                                                    	<a href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>	
                                                    	<a href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    	<a href="{{ URL::to('delete-product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
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