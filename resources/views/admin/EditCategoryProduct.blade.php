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
                            Edit category product
                        </header>
                        <div class="panel-body">
                            @foreach($data as $key=>$category)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category/'.$category->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="CategoryName">Category name:</label>
                                    <input type="text" value="{{$category->category_name}}" name = "CategoryName"class="form-control"  placeholder="Category name">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Decription:</label>
                                    <br>
                                    <textarea  class="form-control " name="CategoryDescription"id="ccomment" name="comment" required="">{{$category->category_desc}}</textarea>
                                </div>
                                
                              
                                <button type="submit" class="btn btn-info">Update category</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection