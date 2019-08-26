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
                               <div class="panel-heading"><h3 class="panel-title">Edit Monthly Expense
                                	<a href="{{ route('monthly.expense')}}" class="pull-right btn btn-danger btn-sm">This Month</a>
                               		<a href="{{ route('today.expense')}}" class="pull-right btn btn-info btn-sm">Today</h3></a>
                           		</div>

                               @if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
                                <div class="panel-body">
                            		<form role="form" action="{{ url('update-monthly-expense/'.$editm->id) }}" method="post">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expense Details</label>
                                            <input type="text" class="form-control" name="details" value="{{$editm->details}}" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Amount</label>
                                            <input type="text" class="form-control" name="amount" value="{{$editm->amount}}" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="date" value="{{ date("d/m/y")}}">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="month" value="{{ date("F")}}">
                                            <input type="hidden" class="form-control" name="year" value="{{ date("Y")}}">
                                        </div>
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
                </div> 
                <!-- End row-->
            </div> <!-- container -->
                               
    </div> <!-- content -->
</div>

@endsection