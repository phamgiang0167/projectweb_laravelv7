@extends('admin-layout')
@section('admin-content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        
                        <header class="panel-heading">
                            Add Coupon
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-coupon')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="CategoryName">Coupon name:</label>
                                    <input type="text" name = "CouponName"class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="Description">Code:</label>
                                    <br>
                                    <textarea class="form-control " name="CouponCode"id="ccomment" name="comment" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Quanlity:</label>
                                    <br>
                                    <textarea class="form-control " name="CouponQuanlity"id="ccomment" name="comment" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Purpose:</label>
                                    <select name="CouponPurpose"class="form-control input-sm m-bot15">
                                        <option value="0">Choose</option>
                                        <option value="1">Decrease by %</option>
                                        <option value="2">Decrease by total cost</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Decrease:</label>
                                    <br>
                                    <textarea class="form-control " name="CouponDecrease"id="ccomment" name="comment" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Condition:</label>
                                    <br>
                                    <textarea class="form-control " name="CouponMinimum"id="ccomment" name="comment" required=""></textarea>
                                </div>

                                
                              
                                <button type="submit" name="addCoupon"class="btn btn-info">Submit</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection