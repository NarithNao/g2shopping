
<!DOCTYPE html>
<html>
<head>
    <title>G2Shopping | Online Shopping</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/png" href="{{asset('images/logo/g2-logo.png')}}" sizes="32x32">
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="{{asset('frontend/css/style4.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <!--- start-rate---->
    <script src="{{asset('frontend/js/jstarbox.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->
    <link href="{{asset('frontend/css/form.css')}}" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="{{url('index')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
{{--                <a href="{{url('index')}}"><img src="{{asset('images/logo/G2.png')}}" alt="" width="170px" style="background-color: pink;"></a>--}}
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-3 header-login">
                <ul>
                    <li><a href="{{url('login')}}">Login</a></li>
                    <li><a href="{{url('register')}}">Register</a></li>
                    <li><a href="{{url('wishlist')}}">Wishlist</a></li>
                    {{--<li><a href="{{url('profile')}}">Narith</a></li>--}}
                </ul>
            </div>
            {{--<div class="col-sm-5 col-xs-12 header-login">
                <ul >
                    <li><a href="#">Welcome back Narith !</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>--}}
            <div class="col-sm-4 header-social">
                <ul >
                    <li><a href="#"><i></i></a></li>
                    <li><a href="#"><i class="ic1"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="container">

        <div class="head-top">

            <div class="col-sm-8 col-md-offset-2 h_menu4">
                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li><a class="color" href="{{url('index')}}">Home</a></li>
                            @foreach($cates as $cate)
                            <li class="dropdown mega-dropdown active">
                                <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">{{$cate->cate_name}}<span class="caret"></span></a>

                                {{--<div class="dropdown-menu ">
                                    <div class="menu-top">
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Submenu1</h4>
                                                <ul>
                                                    <li><a href="{{url('product')}}">Accessories</a></li>
                                                    <li><a href="{{url('product')}}">Bags</a></li>
                                                    <li><a href="{{url('product')}}">Caps & Hats</a></li>
                                                    <li><a href="{{url('product')}}">Hoodies & Sweatshirts</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Submenu2</h4>
                                                <ul>
                                                    <li><a href="{{url('product')}}">Jackets & Coats</a></li>
                                                    <li><a href="{{url('product')}}">Jeans</a></li>
                                                    <li><a href="{{url('product')}}">Jewellery</a></li>
                                                    <li><a href="{{url('product')}}">Jumpers & Cardigans</a></li>
                                                    <li><a href="{{url('product')}}">Leather Jackets</a></li>
                                                    <li><a href="{{url('product')}}">Long Sleeve T-Shirts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Submenu3</h4>
                                                <ul>
                                                    <li><a href="{{url('product')}}">Shirts</a></li>
                                                    <li><a href="{{url('product')}}">Shoes, Boots & Trainers</a></li>
                                                    <li><a href="{{url('product')}}">Sunglasses</a></li>
                                                    <li><a href="{{url('product')}}">Sweatpants</a></li>
                                                    <li><a href="{{url('product')}}">Swimwear</a></li>
                                                    <li><a href="{{url('product')}}">Trousers & Chinos</a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="col1">
                                            <div class="h_nav">
                                                <h4>Submenu4</h4>
                                                <ul>
                                                    <li><a href="{{url('product')}}">T-Shirts</a></li>
                                                    <li><a href="{{url('product')}}">Underwear & Socks</a></li>
                                                    <li><a href="{{url('product')}}">Vests</a></li>
                                                    <li><a href="{{url('product')}}">Jackets & Coats</a></li>
                                                    <li><a href="{{url('product')}}">Jeans</a></li>
                                                    <li><a href="{{url('product')}}">Jewellery</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col1 col5">
                                            <img src="{{asset('frontend/images/me.png')}}" class="img-responsive" alt="">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>--}}

                            </li>
                            @endforeach
                            <li><a class="color3" href="{{url('checkout')}}">Checkout</a></li>
                            {{--<li><a class="color6" href="{{url('logout')}}">Logout</a></li>--}}
                        </ul>
                    </div><!-- /.navbar-collapse -->

                </nav>
            </div>
            <div class="col-sm-2 search-right">
                {{--<ul class="heart">
                    <li>
                        <a href="{{url('wishlist')}}" >
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        </a></li>
                    <li></li>
                </ul>--}}
                <div class="cart box_1">
                    <a href="{{url('checkout')}}">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <img src="{{asset('frontend/images/cart.png')}}" alt=""/></h3>
                    </a>
                    <p><span class="simpleCart_empty">3</span> items</p>

                </div>
                <div class="clearfix"> </div>

                <!----->

                <!---pop-up-box---->
                <link href="{{asset('frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
                <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
                <!----->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!--banner-->
@yield('content')
<!--content-->
<div class="content">
    <div class="container">

        <!--brand-->
        <div class="brand">
            {{--<div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/images/ic.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/images/ic1.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/images/ic2.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/images/ic3.png')}}" class="img-responsive" alt="">
            </div>
            <div class="clearfix"></div>--}}
        </div>
        <!--//brand-->
    </div>

</div>
<!--//content-->
<!--//footer-->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="col-md-3 footer-middle-in">
                {{--<a href="{{url('index')}}"><img src="{{asset('frontend/images/log.png')}}" alt=""></a>--}}
                <h6>G2Shopping</h6>
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>

            <div class="col-md-3 footer-middle-in">
                <h6>Contact us</h6>
                {{--<p>Phone : 010 345 756 / 012 460 580</p>
                <p>Email : narithnao@gmail.com</p>
                <p>Adress: #10E, St. 271, Phnom Penh, Phnom Penh 21000, KH</p>--}}

                <ul class="in text-muted">
                    <li>Phone  : 010 345 756 / 012 460 580</li>
                    <li>Email  : narithnao@gmail.com</li>
                    <li>Adress : #10E, St. 271, Phnom Penh, Phnom Penh 21000, KH</li>
                </ul>
                {{--<ul class="in in1">
                    <li><a href="#">Order History</a></li>
                    <li><a href="{{url('wishlist')}}">Wish List</a></li>
                    <li><a href="{{url('login')}}">Login</a></li>
                </ul>--}}

                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Information</h6>
                <ul class="in">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Newsletter</h6>
                <span>Sign up for News Letter</span>
                <form>
                    <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            {{--<ul class="footer-bottom-top">
                <li><a href="#"><img src="{{asset('frontend/images/f1.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/f2.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/f3.png')}}" class="img-responsive" alt=""></a></li>
            </ul>--}}
            <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="{{url('index')}}" target="_blank">G2Shopping</a> </p>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('frontend/js/simpleCart.min.js')}}"> </script>
<!-- slide -->
<script src="{{asset('frontend/js/imagezoom.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!--light-box-files -->
<script src="{{asset('frontend/js/jquery.chocolat.js')}}"></script>
<link rel="stylesheet" href="{{asset('frontend/css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}" type="text/css" media="screen" />
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('a.picture').Chocolat();
    });
</script>


</body>
</html>