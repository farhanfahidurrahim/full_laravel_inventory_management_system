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
                                <h3 class="panel-title">All Customer</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>email</th>
                                                    <th>Phone</th>
                                                    <th>Adress</th>
                                                    <th>Shopname</th>
                                                    <th>Photo</th>
                                                    <th>Account Holder</th>
                                                    <th>Account Number</th>
                                                    <th>Bank Branch</th>
                                                    <th>Bank Name</th>
                                                    <th>city</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	@foreach($acst as $row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->address }}</td>
                                                    <td>{{ $row->shopname }}</td>
                                                    <td><img src="{{ $row->photo }}" style="height: 70px; width: 70px;"></td>
                                                    <td>{{ $row->account_holder }}</td>
                                                    <td>{{ $row->account_number }}</td>
                                                    <td>{{ $row->bank_branch }}</td>
                                                    <td>{{ $row->bank_name }}</td>
                                                    <td>{{ $row->city }}</td>
                                                    
                                                    <td>
                                                    	<a href="{{ URL::to('view-customer/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>	
                                                    	<a href="{{ URL::to('edit-customer/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    	<a href="{{ URL::to('delete-customer/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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