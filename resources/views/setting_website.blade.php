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
                               <div class="panel-heading"><h3 class="panel-title">Edit Employee</h3></div>
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
                            		<form role="form" action="{{ url('/update-webstite/'.$wb_stng->id) }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" value="{{ $wb_stng->company_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Address</label>
                                            <input type="text" class="form-control" name="company_address" value="{{ $wb_stng->company_address }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Email</label>
                                            <input type="email" class="form-control" name="company_email" value="{{ $wb_stng->company_email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Phone</label>
                                            <input type="text" class="form-control" name="company_phone" value="{{ $wb_stng->company_phone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Mobile</label>
                                            <input type="text" class="form-control" name="company_mobile" value="{{ $wb_stng->company_mobile }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company City</label>
                                            <input type="text" class="form-control" name="company_city" value="{{ $wb_stng->company_city }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Country</label>
                                            <input type="text" class="form-control" name="company_country" value="{{ $wb_stng->company_country }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Company Zipcode</label>
                                            <input type="text" class="form-control" name="company_zipcode" value="{{ $wb_stng->company_zipcode }}" required>
                                        </div>
                                       <div class="form-group">
                                       		<img id="image" src="#" />
                                            <label for="exampleInputPassword1">New Company Logo</label>
                                             <input type="file" name="company_logo" accept="image/*" onchange="readURL(this);">
                                        </div>
                                        <div class="form-group">
                                        	<img src="{{ URL::to($wb_stng->company_logo)}}" style="height: 80px; width: 80px;">
                                        	<input type="hidden" name="old_photo" value="{{ $wb_stng->company_logo}}">
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