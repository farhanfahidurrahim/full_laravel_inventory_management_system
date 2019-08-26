@extends('layouts.app')
@section('content')

<div class="content-page">
    <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome ! {{date("Y")}}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">It</li>
                        </ol>
                    </div>
                </div>

                <a href="{{route('january.expense')}}" class="btn btn-sm btn-info">January</a>
                <a href="{{route('february.expense')}}" class="btn btn-sm btn-info">February</a>
                <a href="{{route('march.expense')}}" class="btn btn-sm btn-info">March</a>
                <a href="{{route('april.expense')}}" class="btn btn-sm btn-success">April</a>
                <a href="{{route('may.expense')}}" class="btn btn-sm btn-success">May</a>
                <a href="{{route('june.expense')}}" class="btn btn-sm btn-success">June</a>
                <a href="{{route('july.expense')}}" class="btn btn-sm btn-primary">July</a>
                <a href="{{route('august.expense')}}" class="btn btn-sm btn-primary">August</a>
                <a href="{{route('september.expense')}}" class="btn btn-sm btn-primary">September</a>
                <a href="{{route('october.expense')}}" class="btn btn-sm btn-warning">October</a>
                <a href="{{route('november.expense')}}" class="btn btn-sm btn-warning">Novmber</a>
                <a href="{{route('december.expense')}}" class="btn btn-sm btn-warning">December</a>

                <!-- Start Widget -->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-12">
                    	
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-danger">Monthly All Expense</h3>
                            </div>
		                @php
		                	$month=date("F");
		                	$tdy=DB::table("expenses")->where('month',$month)->sum('amount');
		                @endphp
               			<h4 style="color: red; font-size:25px" align="center">Total: {{$tdy}} Taka</h4>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Expense Details</th>
                                                    <th>Amount</th>
													<th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	@foreach($mnt_exp as $row)
                                                <tr>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->amount }}</td>
                                                    <td>{{ $row->date}}</td>          
                                                    <td>
                                                    	<a href="{{ URL::to('edit-monthly-expense/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ URL::to('delete-monthly-expense/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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