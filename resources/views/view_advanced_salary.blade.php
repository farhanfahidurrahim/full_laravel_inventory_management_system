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
                               <div class="panel-heading"><h3 class="panel-title">View Salary</h3></div>
                                <div class="panel-body">
                            		
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <p>{{ $views->name }}</p>
                                        </div>                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Salary</label>
                                            <p>{{ $views->salary }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Advanced Salary</label>
                                            <p>{{ $views->advancedsalary }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Month</label>
                                            <p>{{ $views->month }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Year</label>
                                            <p>{{ $views->year }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <p>{{ $views->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <p>{{ $views->phone }}</p>
                                        </div>

                                       <div class="form-group">
                                       		<img style="height: 80px; width: 80px;" src="{{ URL::to($views->photo) }}" />
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