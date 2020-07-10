@extends('admin-layout') 
@section('admin-content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List category product
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>Football Club</th>
            <th>Display</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$FC)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
             
            <td>{{$FC->FC_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                  if($FC->FC_status == "0"){
                ?>
                      <a href="{{URL::to('/FC-active/'.$FC->FC_id)}}">hide</a>
                <?php
                  }else{
                ?>
                    
                      <a href="{{URL::to('/FC-unactive/'.$FC->FC_id)}}">show</a>
                <?php 

                } ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-FC/'.$FC->FC_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Are you sure delete this FC ?')"href="{{URL::to('/delete-FC/'.$FC->FC_id)}}" class="active" ui-toggle-class="">
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