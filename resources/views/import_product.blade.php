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
                               <div class="panel-heading"><h3 class="panel-title text-white">Import Products
                               <a href="{{ route('export')}}" class="pull-right btn btn-danger btn-sm">Download XLSX</a></h3></div>

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
                            		<form role="form" action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
                            			@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">XLsx File Import</label>
                                            <input type="file" class="form-control" name="import_pro_file" required>
                                        </div>
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Upload</button>
                                    </form>
                                </div><!-- panel-body -->
                            </div> <!-- panel -->
                            <div class="container">
                              <strong class="text-danger">Please Download the xlsx file and clear it!! Now ypu can write your all products by listing database and import it. Thank You..</strong>
                            </div>
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