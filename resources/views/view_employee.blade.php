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
                                            <p>{{ $vemp->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <p>{{ $vemp->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <p>{{ $vemp->phone }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <p>{{ $vemp->address }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Experience</label>
                                            <p>{{ $vemp->experience }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NID No.</label>
                                            <p>{{ $vemp->nid_number }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Salary</label>
                                            <p>{{ $vemp->salary }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vacation</label>
                                            <p>{{ $vemp->vacation }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <p>{{ $vemp->city }}</p>
                                        </div>
                                       <div class="form-group">
                                       		<img style="height: 80px; width: 80px;" src="{{ URL::to($vemp->photo) }}" />
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