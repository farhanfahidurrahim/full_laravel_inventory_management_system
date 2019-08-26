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
                                <h3 class="panel-title">All Attendence
                                <a href="{{ route('take.attendence')}}" class="btn btn-sm btn-info pull-right">Take Attendence</a></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            	$sl=1;
                                            ?>
                                            <tbody>
                                            	@foreach($all_attdnc as $row)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $row->date }}</td>               
                                                    <td>
                                                    	<a href="{{ URL::to('edit-attendence/'.$row->date) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ URL::to('view-attendence/'.$row->date) }}" class="btn btn-sm btn-success">View</a>
                                                    	<a href="{{ URL::to('delete-attendence/'.$row->date) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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