@extends('admin-layout') 
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Product
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
             <i></i>
              </label>
            </th>
            <th>Name</th>
            <th>Price</th>
            <th>image</th>
            <th>Category</th>
            <th>FC</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$product)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td><img src="public/upload/product/{{$product->product_image}}" alt="" style="height: 100px;width: 100px"></td>
            <td>{{$product->category_name}}</td>
            <td>{{$product->FC_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                  if($product->product_status == 0){
                ?>
                      <a href="{{URL::to('/product-active/'.$product->product_id)}}">Hide</a>
                <?php
                  }else{
                ?>
                      <a href="{{URL::to('/product-unactive/'.$product->product_id)}}">Show</a>
                <?php 

                } ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Are you sure delete this product ?')"href="{{URL::to('/delete-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
        <div class="col-sm-12 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$data->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div
@endsection