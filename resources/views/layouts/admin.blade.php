 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title_layouts')</title>
    <link href="{{asset('/public/admin')}}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('/public/admin')}}/css/font-awesome.css" rel="stylesheet" />
    <link href="{{asset('/public/admin')}}/css/basic.css" rel="stylesheet" />
    <link href="{{asset('/public/admin')}}/css/custom.css" rel="stylesheet" />
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('admin')}}">MAD SHOP</a>
            </div>

            <div class="header-right">
                <a href="/shop_shoes_2" class="btn btn-info" title="Return Homepage" target="blank"><i class="fa fa-home fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="{{route('logout')}}" class="btn btn-danger" title="Logout admin"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav> 
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="{{asset('/public/admin')}}/img/user.png" class="img-thumbnail" />
                            <div class="inner-text">
                               Admin: {{Auth::guard('admin')->user()->name}}
                            <br />
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="active-menu" href="{{ route('admin')}}"><i class="fa fa-home"></i>Dashboard</a>
                    </li>
                      <li>
                         <a href="#"><i class="fa fa-edit"></i>Quản lý Sản phẩm<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                     
                                    <li>
                                        <a href="{{route('category')}}"><i class="fa fa-list-ul "></i>Danh sách danh mục </a>
                                    </li>
                                     <li>
                                        <a href="{{route('product')}}"><i class="fa fa-list-ul "></i>Danh sách sản phẩm</a>
                                    </li>
                                     <li>
                                        <a href="{{route('attribute')}}"><i class="fa fa-list-ul "></i>Danh sách thuộc tính</a>
                                    </li> 
                                
                                </ul>
                            </li> 

                        <li>
                            <a href="{{route('slide')}}"><i class="fa fa-edit"></i>Quản lý Slides</a>    
                         </li> 
                         <li>
                            <a href="{{route('blog')}}"><i class="fa fa-edit"></i>Quản lý Blogs</a>    
                         </li> 

                            <li>
                         <a href="{{route('donhang')}}"><i class="fa fa-edit"></i>Quản lý Đơn hàng</a>
                                
                            </li>

                             <li>
                                <a href="{{route('hoso')}}"><i class="fa fa-user"></i>Quản lý thành viên</a>
                                
                            </li> 
                     
                      <li>
                    
                    </li> 
                     
                </ul>

            </div>

        </nav>
       
        <div id="page-wrapper">
            <div class="row">
                    <div class="col-md-12">
                        
                        <h1 class="page-subhead-line">@yield('title_layouts')</h1>
                         @yield('content_layouts')
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div id="footer-sec">
        &copy; 2018 Megashop | Design By : <a href="#" target="_blank">Megashop</a>
    </div>
    <script src="{{asset('/public/admin')}}/js/jquery-1.10.2.js"></script>
    <script src="{{asset('/public/admin')}}/js/bootstrap.js"></script>
    <script src="{{asset('/public/admin')}}/js/jquery.metisMenu.js"></script>
    <script src="{{asset('/public/admin')}}/js/custom.js"></script>
    <script src="{{asset('/public/admin')}}/tinymce/tinymce.min.js"></script>
    <script src="{{asset('/public/admin')}}/tinymce/config.js"></script>
</body>
</html> 