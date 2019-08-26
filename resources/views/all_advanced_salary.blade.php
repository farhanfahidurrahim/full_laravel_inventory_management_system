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
                                <h3 class="panel-title">All Advanced Salary</h3>
                                <a href="{{ route('addadvncd.salary')}}" class="btn btn-sm btn-info pull-right">Add New</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Photo</th>
                                                    <th>Salary</th>
                                                    <th>Month</th>
                                                    <th>Advanced</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	@foreach($aladvnslry as $row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td><img src="{{ $row->photo }}" style="height: 70px; width: 70px;"></td>
                                                    <td>{{ $row->salary }} tk</td>
                                                    <td>{{ $row->month }}</td>
                                                    <td>{{ $row->advancedsalary }} tk</td>                 
                                                    <td>
                                                    	<a href="{{ URL::to('view-advanced-salary/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>	
                                                    	<a href="{{ URL::to('edit-advanced-salary/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    	<a href="{{ URL::to('delete-advanced-salary/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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