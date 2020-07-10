@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <div class="brands_products">
                            <h2>NEW ITEM</h2>
                        </div>
                        @foreach($product as $key=>$pro)
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                               
                                <div class="single-products">
                                        <form action="">
                                            {{csrf_field()}}
                                        <input type="hidden" value="{{$pro->product_id}}" class="product_id_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_name}}" class="product_name_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_image}}" class="product_image_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_price}}" class="product_price_{{$pro->product_id}}">
                                        <input type="hidden" value="1" class="product_quantity_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_content}}" class="product_content_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_material}}" class="product_material_{{$pro->product_id}}">
                                        <input type="hidden" value="{{$pro->product_color}}" class="product_color_{{$pro->product_id}}">
                                        <div class="productinfo text-center">
                                            <a href="{{URL::to('/detail/'.$pro->product_id)}}"><img src="{{URL::to('/public/upload/product/'.$pro->product_image)}}" alt="" /></a>
                                            <h2 style="color: #990000">{{$pro->product_price}} vnd</h2>
                                            <div style="height: 50px"><p>{{$pro->product_name}}</p></div>
                                            <button type = "button"class="btn btn-default add-to-cart " name="add-to-cart" data-id="{{$pro->product_id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                        </form>
                                        
                                </div>
                               
                                
                            </div>
                        </div>
                        
                        @endforeach

                    </div><!--features_items-->
                    
                    {{$product->links()}}
                    
                    
@endsection