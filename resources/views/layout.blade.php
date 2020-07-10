<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My shop</title>
    <link rel="stylesheet" href="{asset('public/frontend/css/style.css')" />
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="'{{'public/frontend/images/ico/favicon.ico'}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        
        
        <header id="header"><!--header-->
        
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            
                                <li><a href="{{url('/admin')}}"><i class="fa fa-user"></i> Admin</a></li>
                                <?php 
                                    $customer = Session::get('customer_id');

                                    if(!$customer){  
                                 ?>
                                <li><a href="{{url('/login-checkout')}}"><i class="fa fa-lock"></i>Login</a></li>
                                <?php 
                                    }else{

                                    
                                 ?>
                                 <li><a href="{{url('/logout-checkout')}}"><i class="fa fa-lock"></i>{{Session::get('customer_name')}}, Logout</a></li>
                             <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <img width="100%"src="{{asset('public/frontend/images/coollogo_com-4205973.png')}}" alt="" />
                                    <h2>Enter the code: covid19 to reduce VND 100,000 for orders above 1000000</h2>
                                    <p> </p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public\frontend\images/banner1.png')}}"alt="" />
                                    
                                </div>
                            </div>
                             
                            <div class="item">
                                
                                <div class="col-sm-6">
                                    <img width="100%"src="{{asset('public/frontend/images/coollogo_com-4205973.png')}}" alt="" />
                                    <h2>Enter code: teacher2020 to reduce 5% for orders over VND 500,000</h2>
                                    <p></p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public\frontend\images/banner2.png')}}"alt="" />
                                    
                                </div>
                            
                            </div>
                            <div class="item">
                                
                                <div class="col-sm-6">
                                   <img width="100%"src="{{asset('public/frontend/images/coollogo_com-4205973.png')}}" alt="" />
                                    <h2>Free shipping anywhere and every order</h2>
                                    <p></p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('public\frontend\images/banner3.png')}}"alt="" />
                                    
                                </div>
                            
                            </div>
                        </div>       
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/search')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="search"placeholder="Enter some keyword"/>
                            <input type="submit" style="background-color: #79CDCD;color:red; font-weight: bold;width: 50px"class="btn btn-success btn-sm"value="search">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        
                        <div class="brands_products"><!--category_products-->
                            <h2>OPTIONS</h2>
                            
                           <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li></li>
                                <li class="dropdown"><a href="">Categories<i class="fa fa-angle-down"></i>
                                    </a><ul role="menu" class="sub-menu">
                                        @foreach($category as $key=>$cate)
                                        <li><a href="{{url('/category/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="">Football Club<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                       @foreach($FC as $key=>$FCcate)
                                       <li><a href="{{url('/FC/'.$FCcate->FC_id)}}">{{$FCcate->FC_name}}</a></li>
                                       @endforeach
                                        
                                    </ul>
                                </li> 
                                <li></li><li></li>
                            </ul>
                        </div>
                            
                        </div><!--/category_products-->
                        <!--/brands_products-->

                        
                    
                    </div>
                    <div class="shipping text-center" style="padding-top: 50px">
                     <img width="100%"src="{{asset('public/frontend/images/coollogo_com-308051806.png')}}" alt="" />
                    </div>
                </div>
               

                <div class="col-sm-9 padding-right">
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
   <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>Sport</span>-shop</h2>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
        

    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script type ="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var _token = $('input[name="_token"]').val();
                var id = $(this).data('id');
                var cartID = $('.product_id_'+id).val();
                var cartName = $('.product_name_'+id).val();
                var cartImage = $('.product_image_'+id).val();
                var cartPrice = $('.product_price_'+id).val();
                var cartQuantity = $('.product_quantity_'+id).val();
                
                $.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data:{_token:_token,cartID:cartID,cartName:cartName,cartImage:cartImage,cartPrice:cartPrice,cartQuantity:cartQuantity},
                    success:function(data){
                        swal("Add successful!!", "The item added to cart!", "success");
                    },
                    

                });

            });
            $('.cart').click(function(){
                var _token = $('input[name="_token"]').val();
                var id = $(this).data('id');
                var cartID = $('.product_id_'+id).val();
                var cartName = $('.product_name_'+id).val();
                var cartImage = $('.product_image_'+id).val();
                var cartPrice = $('.product_price_'+id).val();
                var cartQuantity = $('.product_quantity_'+id).val();
                
                $.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data:{_token:_token,cartID:cartID,cartName:cartName,cartImage:cartImage,cartPrice:cartPrice,cartQuantity:cartQuantity},
                    success:function(data){
                        swal("Add successful!!", "The item added to cart!", "success");
                    },
                    

                });

            });
        });
        
    </script>
    
</body>
</html>