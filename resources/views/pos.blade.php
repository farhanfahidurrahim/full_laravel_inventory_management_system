@extends('layouts.app')
@section('content')

<div class="content-page">
    <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 bg-info">
                        <h4 class="pull-left page-title text-white">POS (Point Of Sale)</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#" class="text-white">Echovel</a></li>
                            <li class="text-white">{{ date('d-F-Y')}}</li>
                        </ol>
                    </div>
                </div><br>
		      	<div class="row">
		        	<div class="col-lg-12 col-md-12 col-sm-12 ">
		           	 	<div class="portfolioFilter">
		            		@foreach($cat as $row)
		                		<a href="#" data-filter="*" class="current">{{$row->cat_name}}</a>
		                	@endforeach
		            	</div>
		       	 	</div>
		      	</div>
            <div class="row">
            	<div class="col-lg-6">
            		{{-- <div class="panel">
            			<h4 class="text-info"> Customer
            				<a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
            			</h4>
            			<select class="form-control">
            				<option disabled selected>Select Customer</option>
            				@foreach($cust as $row)
            				<option value="{{$row->id}}">{{ $row->name }}</option>
            				@endforeach
            			</select>
            		</div>
            		<br> --}}
            		<div class="price_card text-center">
            			<h4 class="text">Cart</h4>
	                    <ul class="price-features">
	                        <table class="table">
	                        	<thead class="btn-info">
	                        		<tr>
	                        			<th class="text-white">Name</th>
	                        			<th class="text-white">Quantity</th>
	                        			<th class="text-white">Price</th>
	                        			<th class="text-white">Total</th>
	                        			<th class="text-white">Action</th>
	                        		</tr>
	                        	</thead>
	                        	@php
	                        		$cart_prod=Cart::content()	
	                        	@endphp
	                        	<tbody>
	                        		@foreach($cart_prod as $row)
	                        		<tr>
	                        			<th>{{$row->name}}</th>
	                        			<th>
	                        				<form action="{{url('update-cart/'.$row->rowId)}}" method="post">
	                        					@csrf
	                        				<input type="number" name="qty" value="{{$row->qty}}" style="width: 50px;">
	                        				<button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px;"><i class="fa fa-check"></i></button>
	                        				</form>
	                        			</th>
	                        			<th>{{$row->price}}</th>
	                        			<th>{{$row->price*$row->qty}}</th>
	                        			<th><a href="{{URL::to('delete-cart/'.$row->rowId)}}"><i class="fa fa-trash alt"></i></a></th>
	                        		</tr>
	                        		@endforeach
	                        	</tbody>
	                        </table>
	                    </ul>
	                    <div class="pricing-footer bg-primary">
	                        <p style="font-size: 20px;">Quantity : {{Cart::count()}}</p>
	                        <p style="font-size: 20px;">Sub Total : {{Cart::subtotal()}}</p>
	                        <p style="font-size: 20px;">Vat : {{Cart::tax()}}</p>
	                        <hr>
	                        <p><h3 class="text-white">Total: {{Cart::total()}} Taka</h3></p>

	                    <form action="{{url('invoice-cart')}}" method="post">
		      					@csrf 
		      			<div class="panel"><br>
		      				
		      				@if ($errors->any())
							<div class="alert alert-danger">
							    <ul>
							        @foreach ($errors->all() as $error)
							            <li>{{ $error }}</li>
							        @endforeach
							    </ul>
							</div>
							@endif

        					<h4 class="text-info">Select Customer
        						<a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
        					</h4>
        					@php
        						$cst=DB::table('customers')->get();
        					@endphp
            				<select class="form-control" name="cus_id">
            					<option disabled selected>Select Customer</option>
            					@foreach($cst as $row)
            					<option value="{{$row->id}}">{{ $row->name }}</option>
            					@endforeach
            				</select>
            			</div>	
		      				<input type="hidden" name="customer_id" value="$row->id">	
	                    </div>
	                    <button type="submit" name="submit" class="btn btn-success text-white">Create Invoice</button>
              		</div> <!-- end Pricing_card -->
            	</div>

            	</form>

            	<div class="col-lg-6">
            		<table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Prodcut Code</th>
                                <th>Add Cart</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@foreach($prod as $row)
                            <tr>
                            	<form action="{{ url('add-cart')}}" method="post">
                            	@csrf
                            	<input type="hidden" name="id" value="{{$row->id}}">
                            	<input type="hidden" name="name" value="{{$row->product_name}}">
                            	<input type="hidden" name="qty" value="1">
                            	<input type="hidden" name="price" value="{{$row->selling_price}}">
                                <td>
                                	<img src="{{URL::to($row->product_image)}}" width="60px" height="60px"></td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->cat_name }}</td>
                                <td>{{ $row->product_code }}</td>
                                <td><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus-square"></i></button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            	</div>
            </div>
            </div> <!-- container -->
    </div> <!-- content -->
</div>

<!----Customer Add New Modal----->
	<div class="panel-body">
		<form role="form" action="{{ url('/insert-customer') }}" method="post" enctype="multipart/form-data">
		  @csrf	
			<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header bg-success"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title text-white">Add A New Customer</h4> 
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
                        <div class="modal-body"> 
                            <div class="row"> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-4" class="control-label">Name</label> 
                                        <input type="text" class="form-control" id="field-4" name="name" placeholder="Name" required> 
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-5" class="control-label">Email</label> 
                                        <input type="email" class="form-control" id="field-5" name="email" placeholder="Email" required> 
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Phone</label> 
                                        <input type="text" class="form-control" id="field-6" name="phone" placeholder="Phone" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-4" class="control-label">Address</label> 
                                        <input type="text" class="form-control" id="field-4" name="address" placeholder="Address" required> 
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-5" class="control-label">Shop Name</label> 
                                        <input type="text" class="form-control" id="field-5" name="shopname" placeholder="Shop Name" required> 
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">City</label> 
                                        <input type="text" class="form-control" id="field-6" name="city" placeholder="City" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Account Number</label> 
                                        <input type="text" class="form-control" id="field-6" name="account_number" placeholder="Account Number" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Account Holder</label> 
                                        <input type="text" class="form-control" id="field-6" name="account_holder" placeholder="Account Holder" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Bank Branch</label> 
                                        <input type="text" class="form-control" id="field-6" name="bank_branch" placeholder="Bank Branch" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Bank Name</label> 
                                        <input type="text" class="form-control" id="field-6" name="bank_name" placeholder="Bank Name" required> 
                                    </div> 
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-group">
                                    	<img src="#" id="image">
                                        <label for="field-6" class="control-label">Photo</label> 
                                        <input type="file" name="photo" class="form-control" accept="image/*" required onchange="readURL(this);"> 
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                            <button type="Submit" class="btn btn-info waves-effect waves-light">Submit</button> 
                        </div> 
                    </div> 
                </div>
            </div><!-- /.modal -->
        </form>
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
