@extends('admin-layout')
@section('admin-content')
<div class="table-agile-info">
  	<div class="panel panel-default">
    	<div class="panel-heading">
      		Order detail
    	</div>
		@foreach($shipping as $key=>$data)
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 clearfix">
						<div class="form-group">
				    	<label >Email Customer</label>
				    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->shipping_email}}" readonly>
				  	</div>
				  	<div class="form-group">
				    	<label>Customer name</label>
				    	<input type="text" class="form-control" id="name" value="{{$data->shipping_name}}" readonly>
				  	</div>
				  	<div class="form-group">
				    	<label>Address</label>
				    	<input type="text" class="form-control" id="address" value="{{$data->shipping_address}}" readonly>
				  	</div>
				  	<div class="form-group">
				    	<label>Phone number</label>
				    	<input type="text" class="form-control" id="phone" value="{{$data->shipping_phone}}" readonly>
				  	</div>
				  	<div class="form-group">
				    	<label>Customer name</label>
				    	@if($data->shipping_method == 1)
							<input type="text" class="form-control" id="name" value="Cash on delivery" readonly>
				    	@else
				    	<input type="text" class="form-control" id="name" value="ATM" readonly>
				    	@endif
				  	</div>
				  	<div class="form-group">
				    	<label>Total bill</label>
				    	<input type="text" class="form-control" id="phone" value="{{$data->order_total}}" readonly>
				  	</div>
				  	@if($data->order_status == 1)
				  	<div class="form-group">
				    	<a class="btn btn-success" href="{{url('/confirm-deliver/'.$data->order_id)}}">Confirm delivered</a>
				  	</div>
				  	@else
					<div class="form-group">
				    	<a class="btn btn-danger" >Delivered</a>
				  	</div>		
				  	@endif
				</div>		
				<div class="col-sm-3"></div>
			</div>
		</div>
		@endforeach
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead > 
					<tr class="cart_menu" >
						<th class="image">Item</th>
						<th class="description">description</th>
						<th class="price">Price</th>
						<th class="quantity">Quantity</th>
						<th class="total">Total</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($product as $key=>$pro)
					<tr>
						<td class="cart_product">
							<img src="{{URL::to('/public/upload/product/'.$pro->product_image)}}" alt="" width="60px">
						</td>
						<td class="cart_description" style="width:20%;padding-right: 10px">
							<h4>{{$pro->product_name}}</h4>
							@if($pro->order_detail_number)
								<h5>number: {{$pro->order_detail_number}}</h5>
							@endif
							@if($pro->order_detail_name)
								<h5>name: {{$pro->order_detail_name}}</h5>
							@endif
							@if($pro->product_size)
								<h5>size: {{$pro->product_size}}</h5>
							@endif
							@if($pro->order_detail_image)
								<h5><a href="{{url::to('/public/upload/detail/'.$pro->order_detail_image)}}" target="_blank">image</h5>
							@endif
						</td>
						<td class="cart_price">
							<p> {{$pro->product_price}} VND</p>
						</td> 
						<td><p>{{$pro->product_quanlity}}</p></td>
						<td class="cart_total">
							<p class="cart_total_price">{{$pro->product_price}}</p>
						</td>

					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>		
	</div>
</div>
@endsection