@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <?php
                            $msg = Session::get('MsgAddSuc');
                            if($msg){
                            echo '<span style ="color:red; font-weight:bold">'.$msg.'</span>';
                                Session::put('MsgAddSuc',null);
                            }
                         ?>
                        <header class="panel-heading">
                           Edit FC
                        </header>
                        <div class="panel-body">
                            @foreach($data as $key=>$FC)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-FC/'.$FC->FC_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="FCName">Football club:</label>
                                    <input type="text" value="{{$FC->FC_name}}" name = "FCName"class="form-control"  placeholder="Category name">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Decription:</label>
                                    <br>
                                    <textarea  class="form-control " name="FCDescription"id="ccomment" name="comment" required="">{{$FC->FC_desc}}</textarea>
                                </div>
                                
                              
                                <button type="submit" class="btn btn-info">Update FC</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection