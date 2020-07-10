@extends('cart-layout')
@section('content')


<div class="container">
		<div class="row">
		<div class="col-sm-3">  </div>
		<div class="col-sm-6">
  			<div class="panel-body">
    			<div class="position-center">
    				<h3>One more request</h3>
        			<form action="{{URL::to('/save-request/'.$data['session_id'])}}" method="POST"enctype="multipart/form-data">
        				{{csrf_field()}}
			            <div class="form-group">
			                <label for="exampleInputEmail1">Clothers number</label>
			                <input type="text" class="form-control" id="exampleInputEmail1"  name="number" value="{{$data['order_detail_number']}}" placeholder="number">
			            </div>
			            <div class="form-group">
			                <label for="exampleInputEmail1">Name will print on the clothe</label>
			                <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="{{$data['order_detail_name']}}" placeholder="name">
			            </div>
			            <div class="form-group">
			                <label for="exampleInputPassword1">Size</label>
			                <select name="size" id="">
			                	<option value="m">M</option>
			                	<option value="l">L</option>
			                	<option value="x">X</option>
			                	<option value="xl">XL</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label for="exampleInputFile">The picture will print on the clothe</label>
			                <input type="file" id="exampleInputFile" name="image" >
			            </div>
        				<button type="submit" class="btn btn-info">Submit</button>
   					</form>
    			</div>
    			
    			
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

@endsection