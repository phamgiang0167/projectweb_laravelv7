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
                            Add product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="ProductName">Product name:</label>
                                    <input type="text" name = "ProductName"class="form-control"  placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Decription:</label>
                                    <br>
                                    <textarea class="form-control " name="ProductDescription"id="ccomment" name="comment" required=""></textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="Content">Content:</label>
                                    <br>
                                    <textarea class="form-control " name="ProductContent"id="ccomment" name="comment" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ProductPrice">Price:</label>
                                    <input type="text" name = "ProductPrice"class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="ProductMaterial">Material:</label>
                                    <input type="text" name = "ProductMaterial"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ProductColor">Color:</label>
                                    <input type="text" name = "ProductColor"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ProductImage">Image:</label>
                                    <input type="file" name = "ProductImage"class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="Category">Category:</label>
                                    <select name="CategoryID"class="form-control input-sm m-bot15">
                                        @foreach($category as $key=>$cate)
                                        <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="FC">Football club:</label>
                                    <select name="FCID"class="form-control input-sm m-bot15">
                                        @foreach($FC as $key=>$FCcategory)
                                        <option value="{{($FCcategory->FC_id)}}">{{($FCcategory->FC_name)}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Display">Display:</label>
                                    <select name="ProductStatus"class="form-control input-sm m-bot15">
                                        
                                        <option value="0">Hide</option>
                                        <option value="1">show</option>
                                    </select>
                                </div>
                              
                                <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection