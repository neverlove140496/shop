<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Madshop - @yield('title')</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="{{url('public')}}/home/plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="{{url('public')}}/home/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  
  </head>
  
  <body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>Số 1 - Bắc Từ Liêm - Hà Nội  -  Hotline: +0888888888</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">  
                @if(Auth::check())
                  <div class="header__actions">
                       <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                          style="text-transform: uppercase;" 
                          >
                          <i class="fa fa-user"></i>
                          {{Auth::user()->name}} <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{route('profile')}}">Profile</a></li>
                            <li><a href="{{route('order_history')}}">History</a></li>
                            <li><a href="{{route('change-password')}}">Change password</a></li>
                            <li><a href="{{route('dangxuat')}}">Logout</a></li>
                           
                          </ul>
                        </li>
                          </ul>
                  </div>
                @else
                  <div class="header__actions"><a href="{{route('dangnhap')}}">Login & Register</a></div>
                @endif

            </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="{{route('home')}}"><img src="{{url('public')}}/home/images/logo.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{route('home')}}">Home</a>
                       
                  </li>
           
                  @foreach($cats as $cat) 
                  <li class="menu-item menu-item-has-children dropdown">
                    <a href="#">{{$cat->name}}</a>
                    @if($cat->childs->count())
                      <ul class="sub-menu">
                        @foreach($cat->childs as $c) 
                            <li class="menu-item menu-item-has-children dropdown">
                              <a href="{{route('view',['slug'=>$c->slug])}}">{{$c->name}}</a>
                                @if($c->childs->count())
                                  <ul class="sub-menu">
                                    @foreach($c->childs as $cc) 
                                        <li class="menu-item menu-item-has-children dropdown"><a href="{{route('view',['slug'=>$cc->slug])}}">{{$cc->name}}</a></li>
                                     @endforeach
                                  </ul>
                                @endif
                             </li>
                         @endforeach
                      </ul>
                    @endif
                  </li>
                  @endforeach
                 
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{route('blogs')}}">Blogs</a>
                        
                  </li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{route('contact')}}">Contact</a>
                       
                  </li>
                  
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="{{route('search')}}" method="get">
              <input class="form-control" type="text" name="search" id="search" placeholder="Search Product…">
              <button><i class="ps-icon-search"></i></button>
            </form>
    <div class="ps-cart"><a class="ps-cart__toggle" href="{{route('view-cart')}}"><span><i>{{($cart->total_quantity)}}</i></span><i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content">

                @foreach($cart->items as $item)  

                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="{{route('delete-cart',['id'=>$item['id']])}}"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a>
                    <img src="{{url('uploads')}}/{{$item['image']}}" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">{{$item['name']}}</a>
                      <p><span>Qty:<i>{{$item['quantity']}}</i></span><span>Total:<i>{{number_format($item['price']*$item['quantity'])}} vnđ</i></span></p>
                    </div>
                  </div>

                @endforeach
                </div>
                <div class="ps-cart__total">
                 
                  <p>Total Price: <span>{{number_format($cart->total_amount)}} vnđ</span></p>
                </div>

                @if($cart->total_quantity>0)
                  <div class="ps-cart__footer"><a class="ps-btn" href="{{route('order')}}">Check out<i class="ps-icon-arrow-left"></i></a></div>
                @else
                   <div class="ps-cart__footer"><a class="ps-btn">Cart is empty!!!</a></div>
                @endif

              </div>
            </div>

         
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
    
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng miễn phí</strong> : Giao hàng miễn phí trên toàn quốc</p>
        <p class="ps-service"> <i class="fas fa-money-bill-alt"></i><strong>Thanh toán nhanh </strong> : Thanh toán  nhanh dưới mọi hình thức</p> 
         <p class="ps-service"><i class="far fa-check-circle"></i><strong>Uy tín chất lượng</strong> : Đối hàng trong vòng 15 ngày</p>
        
      </div>
    </div>

    <main class="ps-main">

     @if(request()->is('/'))
      <div id="slide" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#slide" data-slide-to="0" class=""></li>
          
          <li data-target="#slide" data-slide-to="1" class="active"></li>
        </ol>

        <div class="carousel-inner">

         @foreach($slide as $sl)
          <div class="item ">
            <img src="{{url('uploads')}}/{{$sl->image}}" width="100%" >
            <div class="container">
              <div class="carousel-caption">
                <h1 style="color:white;">{{$sl->caption_1}}</h1>
                <p></p>
                <p><a class="btn btn-md btn-primary" href="#" role="button">Shop now</a></p>
              </div>
            </div>
          </div>
         @endforeach
          <div class="item active">
            <img src="{{url('public')}}/home/images/slider/3.jpg" width="100%">
            <div class="container">
              <div class="carousel-caption">
                <h1 style="color:white;">Sports 2019</h1>
                <p></p>
                <p><a class="btn btn-md btn-primary" href="#" role="button">Shop now</a></p>
              </div>
            </div>
          </div>
        </div>


        <a class="left carousel-control" href="#slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    @endif
      <!-- Main-->
      @yield('main')  
  <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
               
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Sign up now</button>
                  </form>
                </div>
              
          </div>
        </div>
      </div>
      <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
        <div class="ps-footer__content">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="index.html"><img src="{{url('public')}}/home/images/logo-white.png" alt=""></a>
                        <h3 class="ps-widget__title">Address  </h3>
                      </header>
                      <footer>
                        <p><strong>Tầng 2, Số 1, Hồ Tùng Mậu,  Bắc Từ Liêm - Hà Nội</strong></p>
                        <p>Email: <a href=''>madshop@shop.com</a></p>
                        <p>Phone: +0888888888</p>
                        <p>Fax: ++323 32434 533</p>
                      </footer>
                    </aside>
                  </div>
                 
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Find Our store</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--link">
                          <li><a href="#">Coupon Code</a></li>
                          <li><a href="#">SignUp For Email</a></li>
                          <li><a href="#">Site Feedback</a></li>
                          <li><a href="#">Careers</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Get Help</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Order Status</a></li>
                          <li><a href="#">Shipping and Delivery</a></li>
                          <li><a href="#">Returns</a></li>
                          <li><a href="#">Payment Options</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Products</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Clothing</a></li>
                          <li><a href="#">Accessries</a></li>
                          <li><a href="#">Football Boots</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
            </div>
          </div>
        </div>
        <div class="ps-footer__copyright">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">abc</a>, Inc. All rights Resevered.</p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- JS Library-->

    <script type="text/javascript" src="{{url('public')}}/home/plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/home/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src=""></script><script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="{{url('public')}}/home/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{url('public')}}/home/js/main.js"></script>
  </body>
</html>