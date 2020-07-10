@extends('cart-layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li ><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php 
					$mes = Session::get('deleteSuc');
					
				 ?>
			<span style = "color: red; font-weight: bold"><?php echo $mes; Session::put('deleteSuc',null); ?></span>

			<?php 
					$mes = Session::get('update');
					
				 ?>
			<span style = "color: red; font-weight: bold"><?php echo $mes; Session::put('update',null); ?></span>
			<div class="table-responsive cart_info">
				<form action="{{URL::to('/update-cart')}}" method="POST">
					{{csrf_field()}}
				<table class="table table-condensed">
					<thead > 
						<tr class="cart_menu" >
							<td class="image">Item</td>
							<td class="description">description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="request">Add request</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$item = Session::get('cart');
							$total_cost = 0;
							if($item){
								
								foreach($item as $key=>$cart){
									$price_item = $cart['product_qty']*$cart['product_price'];
									$total_cost += $price_item;

							
						 ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('public/upload/product/'.$cart['product_image'])}}" alt="" width="38px"></a>
							</td>
							<td class="cart_description" style="width:20%;padding-right: 10px">
								<h4><a href="">{{$cart['product_name']}}</a></h4>
								@if($cart['order_detail_number'])
									<h5>number: {{$cart['order_detail_number']}}</h5>
								@endif
								@if($cart['order_detail_name'])
									<h5>name: {{$cart['order_detail_name']}}</h5>
								@endif
								@if($cart['product_size'])
									<h5>size: {{$cart['product_size']}}</h5>
								@else
									<h5>size: M</h5>
								@endif
								@if($cart['order_detail_image'])
									<h5><a href="{{url::to('/public/upload/detail/'.$cart['order_detail_image'])}}" target="_blank">image</h5>
								@endif
							</td>
							<td class="cart_price">
								<p>{{$cart['product_price']}} VND</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									
									<div><input class="" type="text" name="quantity[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" autocomplete="off" size="2"></div>
									
									<div></div>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$price_item}}</p>
							</td>
							<td>
								<a class="" href="{{URL::to('/add-request/'.$cart['session_id'])}}"><i class="fa fa-plus-square fa-3x"></i></a>
							</td>

							<td>
								<a class="cart_quantity_delete" min ="1"href="{{URL::to('/delete-cart/'.$cart['session_id'])}}"><i class="fa fa-minus-square fa-3x"></i></a>
							</td>
						</tr>
						<?php 

						}} ?>
						
					</tbody>
				</table>
				<input type="submit" class="update_quantity btn btn-default check_out"value="update cart" name="update_quantity" >
				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	<section id="do_action">
		<div class="container ">
			<div class="heading">
				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6"></div>
					<div class="total_area col-sm-6 " style="right:0">
						
						<?php 
							$msg = Session::get('msg');
							if($msg == 'suc'){
						?>
							<div class="alert alert-success" role="alert">Use the code successfully</div>
						
						<?php  
							Session::put('msg',null);
							}if($msg == 'no'){
						?>
							<div class="alert alert-warning" role="alert">This code is already in use or does not exist</div>
						<?php 
							Session::put('msg',null);
							}
						 ?>

						<table class="table">
  							<thead class="thead">
							    <tr>
							      
							      <th scope="col">Cost</th>
							      <th scope="col">Coupon</th>
							      <th scope="col">Total decrease</th>
							      <th scope="col">Ship fee</th>
							      <th scope="col">Total cost</th>
							    </tr>
  							</thead>
  							<tbody>
    							<tr>
							      <td>{{$total_cost}} vnd</td>
							      <td><?php 
							      $last_cost = $total_cost;
							      		if(Session::get('coupon') ){
							      			foreach(Session::get('coupon') as $key=> $cou){
							      				if($cou['coupon_purpose'] == 1 &&  ($total_cost>=$cou['coupon_minimum'])){
							      					echo 'Decrease: '.$cou['coupon_decrease'].'%';
							      					$last_cost = (100-$cou['coupon_decrease'])/100 * $total_cost;
							      				}else{
							      					if($cou['coupon_purpose'] == 2  &&  ($total_cost>=$cou['coupon_minimum'])){
							      					echo 'Decrease: '.$cou['coupon_decrease'].'vnd';
							      					$last_cost = $total_cost - $cou['coupon_decrease'];
							      					}else{
							      						echo 'Not eligible to use this discount code';
							      					}
							      				}
							      			}
							      		}
							      		if($last_cost<0){
							      			$last_cost=0;
							      		}
							       ?>
									
									</td>
									<td>{{$total_cost-$last_cost}} vnd</td>
							      <td>Free</td>
							      <td>{{$last_cost}} vnd</td>
							    </tr>
    								<?php 
    									Session::put('last_total', $last_cost);
    								 ?>
  							</tbody>
						</table>
						<div class="col-sm-12">
						<div class="col-sm-9">
							<form action="{{url('/confirm-coupon')}}" method="POST">
								{{csrf_field()}}
								<div class="col-sm-9">
									<input class="form-control" name="coupon"type="text" placeholder="Enter a coupon">
								</div>
								<div class="col-sm-3">
								    <button class="btn btn-default coupon">confirm</button>
								    </div>
								
							</form>
						</div>
						<?php 
							$cus = Session::get('customer_id');
							if($cus){
						 ?>
						 <div class="col-sm-3">
							<a class="btn btn-default coupon"  style="background-color: #FF6600;color: #FFFF33;float:right" href="{{url('/checkout')}}">Payment</a>
						</div>
						<?php 
							}else{
						 ?>
						<div class="col-sm-3">
							<a class="btn btn-default coupon"  style="background-color: #FF6600;color: #FFFF33;float:right" href="{{url('/login-checkout')}}">Payment</a>
						</div>
					<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection