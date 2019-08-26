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
                            		<form role="form" action="{{ url('/update-employee/'.$eemp->id) }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $eemp->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $eemp->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $eemp->phone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $eemp->address }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Experience</label>
                                            <input type="text" class="form-control" name="experience" value="{{ $eemp->experience }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NID No.</label>
                                            <input type="text" class="form-control" name="nid_number" value="{{ $eemp->nid_number }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Salary</label>
                                            <input type="text" class="form-control" name="salary" value="{{ $eemp->salary }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vacation</label>
                                            <input type="text" class="form-control" name="vacation" value="{{ $eemp->vacation }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $eemp->city }}" required>
                                        </div>
                                       <div class="form-group">
                                       		<img id="image" src="#" />
                                            <label for="exampleInputPassword1">New Photo</label>
                                             <input type="file" name="photo" accept="image/*" onchange="readURL(this);">
                                        </div>
                                        <div class="form-group">
                                        	<img src="{{ URL::to($eemp->photo)}}" style="height: 80px; width: 80px;">
                                            <input type="hidden" name="old_photo" value="{{ $eemp->photo}}">
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