@extends('admin-layout') 
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List category product
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
            <th>Category</th>
            <th>display</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$category)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
             
            <td>{{$category->category_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                  if($category->category_status == "0"){
                ?>
                      <a href="{{URL::to('/active/'.$category->category_id)}}">hide</a>
                <?php
                  }else{
                ?>
                    
                      <a href="{{URL::to('/unactive/'.$category->category_id)}}">show</a>
                <?php 

                } ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-category/'.$category->category_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Are you sure delete this category ?')"href="{{URL::to('/delete-category/'.$category->category_id)}}" class="active" ui-toggle-class="">
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
            {{ $data->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div
@endsection