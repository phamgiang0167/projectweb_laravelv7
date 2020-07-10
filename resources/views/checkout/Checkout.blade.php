@extends('cart-layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li ><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Plase sign in/up to check out </p>
			</div><!--/register-req-->
			
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6 clearfix">
						<div class="bill-to">
							<p>Fill out the form below</p>
							<?php 
								$msg = Session::get('msg');
								if($msg){
							?>
								<span style="color: red;font-weight: bold">{{$msg}}</span>
							<?php Session::put('msg',null);} ?>
							<?php 
								$msg = Session::get('notice');
								if($msg == 'suc'){
							?>
								<div class="alert alert-success" role="alert">Order Success</div>
							<?php  
								Session::put('notice',null);
								}if($msg == 'no'){
							?>
								<div class="alert alert-warning" role="alert">Cart is empty, please purchase at least one item before checking out</div>
							<?php 
								Session::put('notice',null);
							}
						 ?>
							<div class="form-one">
								<form action="{{URL::to('/confirm')}}" method="POST">
									{{csrf_field()}}
									<input type="text" class="shipping_email"name ="shipping_email"placeholder="Email*">
									<input type="text"class="shipping_name"name ="shipping_name" placeholder="Full Name*">
									<input type="text" class="shipping_address"name ="shipping_address"placeholder="Address*">
									<input type="text" class="shipping_phone"name ="shipping_phone"placeholder="Phone number*">
									<p>Select Payment method</p>
									<select name="newPaymentMethod" id="" class = "method">
										<option value="1">Cash on delivery</option>
										<option value="2">ATM Banking</option>
									</select>
									
									@if(Session::get('coupon'))
										@foreach(Session::get('coupon') as $key=>$cou)
											<input type="hidden" class="coupon"name ="coupon" value="{{$cou['coupon_code']}}">
										@endforeach
									@else
										<input type="hidden" class="coupon"name ="coupon" value="No">
									@endif
									<h2></h2>
						    			<p>Total Cost</p>
									 <input type="text" value ="{{Session::get('last_total')}} VND" readonly>  
									<input type="submit" onclick="return confirm('Are you sure delete this product ?')"value="Confirm" name="send" class="btn btn-primary btn-sm send" style="font-weight: bold">
								</form>
							</div>
						</div>
					</div>	
								
				</div>
			</div>
			
			
		</div>
	</section> <!--/#cart_items-->
@endsection