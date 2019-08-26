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
                               <div class="panel-heading"><h3 class="panel-title">Edit Supplier</h3></div>
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
                            		<form role="form" action="{{ url('update-supplier/'.$esplr->id) }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $esplr->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $esplr->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $esplr->phone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $esplr->address }}" required>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier Type</label>
                                            <select name="type" class="form-control">
                                                <option disabled="" selected="">Select Type</option>
                                                <option value="{{ $esplr->type }}">{{$esplr->type}}</option>
                                            </select>
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier Type</label>
                                            <select name="type" class="form-control">
                                                <option disabled="" selected="">{{$esplr->type}}</option>
                                                <option value="Distributer">Distributer</option>
                                                <option value="Whole Seller">Whole Seller</option>
                                                <option value="Broker">Broker</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Shop</label>
                                            <input type="text" class="form-control" name="shop" value="{{ $esplr->shop }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Holder</label>
                                            <input type="text" class="form-control" name="accountholder" value="{{ $esplr->accountholder }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <input type="text" class="form-control" name="accountnumber" value="{{ $esplr->accountnumber }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Branch</label>
                                            <input type="text" class="form-control" name="bankbranch" value="{{ $esplr->bankbranch }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Name</label>
                                            <input type="text" class="form-control" name="bankname" value="{{ $esplr->bankname }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $esplr->city }}" required>
                                        </div>
                                       <div class="form-group">
                                       		<img id="image" src="#" />
                                            <label for="exampleInputPassword1">New Photo</label>
                                             <input type="file" name="photo" accept="image/*" onchange="readURL(this);">
                                        </div>
                                        <div class="form-group">
                                        	<img src="{{ URL::to($esplr->photo)}}" style="height: 80px; width: 80px;">
                                            <input type="hidden" name="old_photo" value="{{ $esplr->photo}}">
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