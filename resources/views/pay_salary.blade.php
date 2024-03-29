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
                                <h3 class="panel-title">Pay Salary<span class="pull-right text-danger">{{ date("F Y")}}</span></h3>

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
                                                    <th>Pay Month</th>
                                                    <th>Advanced</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <!---- advanced salary paid ---->
                                            @php
                                            	$month = date("F", strtotime('-1 month'));
											    $payslry=DB::table('advance_salaries')
											         ->join('employees','advance_salaries.emp_id','employees.id')
											         ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
											         ->where('month',$month)
											         ->get();
                                            @endphp

                                            <tbody>
                                            	@foreach($employee as $row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td><img src="{{ $row->photo }}" style="height: 70px; width: 70px;"></td>
                                                    <td>{{ $row->salary }} tk</td> 
                                                    <td><span class="badge badge-success">{{ date("F", strtotime('-1 months')) }}</span></td>
                                                    <td>ase</td>          
                                                    <td>
                                                    	<a href="#" class="btn btn-sm btn-danger" id="delete">Pay Now</a>
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