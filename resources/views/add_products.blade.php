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
                               <div class="panel-heading"><h3 class="panel-title text-white">Add Products</h3></div>
                               <a href="{{route('all.product')}}" class="pull-right btn btn-danger btn-sm">All Products</a>

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
                            		<form role="form" action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code</label>
                                            <input type="text" class="form-control" name="product_code" placeholder="Enter Product Code" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            @php
                                                $cat=DB::table('categories')->get();
                                            @endphp
                                            <select name="cat_id" class="form-control" required>
                                                @foreach($cat as $row)
                                                <option disabled selected>Select Category</option>
                                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier</label>
                                            @php
                                                $supp=DB::table('suppliers')->get();
                                            @endphp
                                            <select name="sup_id" class="form-control">
                                                @foreach($supp as $row)
                                                <option disabled selected>Select Supplier</option>
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Storage</label>
                                            <input type="text" class="form-control" name="product_storage" placeholder="Enter Product Storage" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Route</label>
                                            <input type="text" class="form-control" name="product_route" placeholder="Enter Product Route" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Buying Date</label>
                                            <input type="date" class="form-control" name="buy_date" placeholder="Enter Buying Date" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expire Date</label>
                                            <input type="date" class="form-control" name="expire_date" placeholder="Enter Expire Date" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Buying Price</label>
                                            <input type="text" class="form-control" name="buying_price" placeholder="Enter Buying Price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price" placeholder="Enter Selling Price" required>
                                        </div>

                                        <div class="form-group">
                                            <img id="iamge" src="#"/>
                                            <label for="exampleInputEmail1">Photo</label>
                                            <input type="file" name="product_image" accept="image/*" required onchange="readURL(this);">
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