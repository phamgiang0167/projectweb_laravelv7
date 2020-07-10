@extends('admin-layout') 
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List coupon
    </div>
   
    <div class="table-responsive">
      <?php
                            $msg = Session::get('MsgAddSuc');
                            if($msg){
                            echo '<span style ="color:red; font-weight:bold">'.$msg.'</span>';
                                Session::put('MsgAddSuc',null);
                            }
                         ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
             <i></i>
              </label>
            </th>
            <th>Coupon name</th>
            <th>Code</th>
            <th>Quanlity</th>
            <th>Purpose</th>
            <th>Content</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key=>$cou)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
             
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_quanlity}}</td>
            <td><span class="text-ellipsis">
                <?php
                  if($cou->coupon_purpose == "1"){
                    echo 'decrease by %';
                  }else{
                    echo 'decrease by total cost';
                  }
                ?>
                      
                
            </span></td>
            <td><span class="text-ellipsis">
                <?php
                  if($cou->coupon_purpose == "1"){
                    echo $cou->coupon_decrease.'%';
                  }else{
                    echo $cou->coupon_decrease.' vnd';
                  }
                ?>
                      
                
            </span></td>
            <td>
              
              <a onclick="return confirm('Are you sure delete this category ?')"href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
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
            
            {{$coupon->links()}}
            
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div
@endsection