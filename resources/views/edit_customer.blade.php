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
                            		<form role="form" action="{{ url('/update-customer/'.$edt_cust->id) }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $edt_cust->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $edt_cust->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $edt_cust->phone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $edt_cust->address }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Shop Name</label>
                                            <input type="text" class="form-control" name="shopname" value="{{ $edt_cust->shopname }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Holder</label>
                                            <input type="text" class="form-control" name="account_holder" value="{{ $edt_cust->account_holder }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <input type="text" class="form-control" name="account_number" value="{{ $edt_cust->account_number }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Branch</label>
                                            <input type="text" class="form-control" name="bank_branch" value="{{ $edt_cust->bank_branch }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" value="{{ $edt_cust->bank_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $edt_cust->city }}" required>
                                        </div>
                                       <div class="form-group">
                                       		<img id="image" src="#" />
                                            <label for="exampleInputPassword1">New Photo</label>
                                             <input type="file" name="photo" accept="image/*" onchange="readURL(this);">
                                        </div>
                                        <div class="form-group">
                                        	<img src="{{ URL::to($edt_cust->photo)}}" style="height: 80px; width: 80px;">
                                            <input type="hidden" name="old_photo" value="{{ $edt_cust->photo}}">
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