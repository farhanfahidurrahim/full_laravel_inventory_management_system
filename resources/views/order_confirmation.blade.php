@extends('layouts.app')
@section('content')

	<div class="content-page">
            <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    {{-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> --}}
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            
                                            <div class="pull-right">
                                                <h4>Order Date : <br>
                                                    <strong>{{ $vw_ordr->order_date}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name : {{$vw_ordr->name}}</strong><br>
                                                      <strong>Shop Name : {{$vw_ordr->shopname}}</strong><br>
                                                      Address : {{$vw_ordr->address}}<br>
                                                      City : {{$vw_ordr->city}}<br>
                                                      Phone : {{$vw_ordr->phone}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today Date : </strong>{{date("l jS \of F Y")}}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{$vw_ordr->order_status}}</span></p>
                                                    <p class="m-t-10"><strong>Order ID : </strong> {{$vw_ordr->id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr>
		                                                        <th>#</th>
		                                                        <th>Product Name</th>
		                                                        <th>Product Code</th>
		                                                        <th>Quantity</th>
		                                                        <th>Unit Cost</th>
		                                                        <th>Total</th>
		                                              
                                                        	</tr>
                                                        </thead>
                                                        <tbody>
                                                        	@php
                                                        		$sl=1;
                                                        	@endphp 
                                                        	@foreach($vw_ord_dtls as $row)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$row->product_name}}</td>
                                                                <td>{{$row->product_code}}</td>
                                                                <td>{{$row->quantity}}</td>
                                                                <td>{{$row->unitcost}}</td>
                                                                <td>{{$row->unitcost*$row->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-9">
                                                <h4>Payment By : {{$vw_ordr->payment_status}}</h4>
                                                <h5>Pay : {{$vw_ordr->pay}}</h5>
                                                <h5>Due : {{$vw_ordr->due}}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-Total:</b> {{$vw_ordr->sub_total}}</p>
                                                <p class="text-right">VAT: {{$vw_ordr->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{$vw_ordr->total}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($vw_ordr->order_status=='success')
                                        @else
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="{{URL::to('order-done/'.$vw_ordr->id)}}" class="btn btn-primary waves-effect waves-light">Done</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
            	</div> <!-- container -->              
    		 </div> <!-- content -->
			{{--<footer class="footer text-right">
                    2015 © Moltran.
                </footer> --}}
 	</div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


<!----Paybale Model----->
		{{-- <form role="form" action="{{ url('final-invoice') }}" method="post">
		  @csrf	
			<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header bg-success"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title text-white"> Inovice Of - {{$cus->name}}<span class="pull-right">Total : {{Cart::total()}}</span></h4> 
                        </div>
                        {{--vw_ordr @if ($errors->any())
							<div class="alert alert-danger">
							    <ul>
							        @foreach ($errors->all() as $error)
							            <li>{{ $error }}</li>
							        @endforeach
							    </ul>
							</div>
							@endif --}
                        <div class="modal-body"> 
                            <div class="row"> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-4" class="control-label">Payment</label> 
                                        <select class="form-control" name="payment_status" required>
                                        	<option value="" disabled selected>Select a Method</option>
                                        	<option value="HandCash">Hand Cash</option>
                                        	<option value="Bkash">Bkash</option>
                                        	<option value="Rocket">Rocket</option>
                                        	<option value="Cheque">Cheque</option>
                                        	<option value="Card">Card</option>
                                        	<option value="Due">Due</option>
                                        </select>
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-5" class="control-label">Pay</label> 
                                        <input type="text" class="form-control" id="field-5" name="pay" placeholder="Pay" required> 
                                    </div> 
                                </div> 
                                <div class="col-md-4"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Due</label> 
                                        <input type="text" class="form-control" id="field-6" name="due" placeholder="Due" required> 
                                    </div> 
                                </div>
                            </div> 
                        </div>
                        <input type="hidden" name="customer_id" value="{{$cus->id}}">
                        <input type="hidden" name="order_date" value="{{date('d-F-Y')}}">
                        <input type="hidden" name="order_status" value="pending">
                        <input type="hidden" name="total_products" value="{{Cart::count()}}">
                        <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                        <input type="hidden" name="vat" value="{{Cart::tax()}}">
                        <input type="hidden" name="total" value="{{Cart::total()}}">
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                            <button type="Submit" class="btn btn-info waves-effect waves-light">Submit</button> 
                        </div> 
                    </div> 
                </div>
            </div><!-- /.modal -->
        </form> --}}

@endsection