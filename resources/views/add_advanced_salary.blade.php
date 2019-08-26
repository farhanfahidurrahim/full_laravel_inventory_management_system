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
                            <div class="panel panel-info">
                               <div class="panel-heading"><h3 class="panel-title text-white">Add Advanced Salary</h3></div>
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
                            		<form role="form" action="{{ url('/insert-advanced-salary') }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Name</label>
                                            @php
                                            	$emp=DB::table('employees')->get();
                                            @endphp
                                            <select name="emp_id" class="form-control" required>
                                                <option value="" disabled selected>Select Name</option>
                                                @foreach($emp as $row)
                                                <option value="{{ $row->id}}">{{ $row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Month</label>
                                            <select name="month" class="form-control" required>
                                                <option value="" disabled selected>Select Month</option>
                                            	<option value="January">January</option>
                                            	<option value="Februay">Februay</option>
                                            	<option value="March">March</option>
                                            	<option value="April">April</option>
                                            	<option value="May">May</option>
                                            	<option value="June">June</option>
                                            	<option value="July">July</option>
                                            	<option value="August">August</option>
                                            	<option value="September">September</option>
                                            	<option value="October">October</option>
                                            	<option value="November">November</option>
                                            	<option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Year</label>
                                            <input type="text" class="form-control" name="year" placeholder="Enter Year" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Advanced Salary</label>
                                            <input type="text" class="form-control" name="advancedsalary" placeholder="Advanced Salary" required>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col-->
                </div> 
                <!-- End row-->
            </div> <!-- container -->
                               
    </div> <!-- content -->
</div>

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection