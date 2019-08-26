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
                                <h3 class="panel-title">Update Attendence</h3>
                            </div>
                            <h3 style="color:green" align="center">Update :{{date("d/F/y")}}</h3>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Attendence</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	<form action="{{url('/update-attendence')}}" method="post">
                                            	@csrf
                                            	@foreach($edt_att as $row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td><img src="{{ URL::to($row->photo) }}" style="height: 70px; width: 70px;"></td>
                                                    <input type="hidden" name="id[]" value="{{$row->id}}">
                                                    <td>
                                                    	<input type="radio" name="attendence[{{$row->id}}]" value="Present" required <?php if ($row->attendence=='Present'){
                                                    		echo "checked";
                                                    	} ?>>Present

                                                    	<input type="radio" name="attendence[{{$row->id}}]" value="Absence" required <?php if ($row->attendence=='Absence') {
                                                    		echo "checked";
                                                    	} ?>>Absence

                                                    	<input type="radio" name="attendence[{{$row->id}}]" value="LatePresent" required <?php if ($row->attendence=='LatePresent') {
                                                    		echo "checked";
                                                    	} ?>>Late Present

                                                    </td>
                                                    <input type="hidden" name="att_date" value="{{date("d/F/y")}}">
                                                    <input type="hidden" name="att_year" value="{{date("Y")}}">
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        		<button type="submit" class="btn btn-success">Update Attendence</button>
                                        		</form>
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