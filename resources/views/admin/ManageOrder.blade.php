@extends('admin-layout') 
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Orders
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Order code</th>
            <th>Status</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
          <tbody>
            <?php $i =0;?>
            @foreach($order as $key=>$od)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$od->order_id}}</td>
              <?php if($od->order_status == 1){?>
              <td>
                <a class="btn btn-success" href="{{url('/confirm-deliver/'.$od->order_id)}}">Unconfimred</a>
              </td>
              <?php }else{ ?>
              <td>processed</td>
              <?php } ?>
              <td>
                <a href="{{URL::to('/view-order/'.$od->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Are you sure delete this order ?')"href="{{URL::to('/delete-order/'.$od->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            @endforeach
            </tr>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-12 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$order->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div
@endsection