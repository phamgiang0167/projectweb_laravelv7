@extends('layout')
@section('content')
@foreach($product as $key=>$pro)
<div class="product-details"><!--product-details-->

						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<input type="hidden" value="{{$pro->product_id}}" class="product_id_{{$pro->product_id}}">
                            <input type="hidden" value="{{$pro->product_name}}" class="product_name_{{$pro->product_id}}">
                            <input type="hidden" value="{{$pro->product_image}}" class="product_image_{{$pro->product_id}}">
                            <input type="hidden" value="{{$pro->product_price}}" class="product_price_{{$pro->product_id}}">
                            
							<form action="">
								{{csrf_field()}}
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$pro->product_name}}</h2>
								<p>Product ID: {{$pro->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<?php
										$price = $pro->product_price ;
									 ?>
									<span>{{$price}} VND</span>
									
								
								</span>
								<p><b>Availability: </b> In Stock</p>
								<p><b>Condition: </b> New</p>
								<p><b>Category: </b>{{$pro->category_name}}</p>
								<?php 
									if(!$pro->FC_id){
										$FC_name = 'No Football club';
									}else{
										$FC_name= $pro->FC_name;
									}
								 ?>
								<p><b>Football club: </b>{{$FC_name}} </p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								
								<label>Quantity:</label><input class="product_quantity_{{$pro->product_id}}"name = "quantity"type="number" value="1" /><br><br>
								
								<input name = "product_id"type="hidden" value="{{$pro->product_id}}">
								<button type = "button"class="btn btn-success cart" name="add-to-cart" data-id="{{$pro->product_id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</form>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
							
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-6">
									<div class="product-image-wrapper">
										<div class="single-products">
											
												
												<h3>{{$pro->product_content}}</h3>
											
										</div>
									</div>
								</div>
								<div class="col-sm-6">
								<div class="col-sm-6">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>Material</h2>
												<h3>{{$pro->product_material}}</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>Color</h2>
												<h3>{{$pro->product_color}}</h3>
											</div>
										</div>
									</div>
								</div>
								</div>
								
							</div>
						</div>
					</div><!--/category-tab-->
					@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active"><?php
									for($i =0; $i<sizeof($recommend) ;$i++){
										if($i==3) break;?>
										
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{URL::to('detail/'.$recommend[$i]->product_id)}}"><img src="{{URL::to('public/upload/product/'.$recommend[$i]->product_image)}}" alt="" /></a>
													<h2>{{$recommend[$i]->product_price}} VND</h2>
													<p>{{$recommend[$i]->product_name}}</p>
													
												</div>
											</div>
										</div>
									</div>
									<?php  }?>
								</div>
								<?php 
									
									$step = sizeof($recommend)/3;
									$step--;
									if(sizeof($recommend)>3){
								 ?>

								<div class="item"><?php  
									for($i = $step*3; $i< sizeof($recommend) ;$i++){
										if(($i+1)%3==0)
											$step++;
										else{
										?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{URL::to('detail/'.$recommend[$i]->product_id)}}"><img src="{{URL::to('public/upload/product/'.$recommend[$i]->product_image)}}" alt="" /></a>
													<h2>{{$recommend[$i]->product_price}}</h2>
													<p>{{$recommend[$i]->product_name}}</p>
										
												</div>
											</div>
										</div>
									</div>
									<?php  }}?>
								</div>
							<?php } ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

					@endsection