@inject('categories', 'App\Models\Category')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title or 'Flooring To Go'}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content=" " />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!--CSS Person-->
        <link rel="stylesheet" href="{{url('assets/portal/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/easy-responsive-tabs.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/style.css')}}">
        <link rel="stylesheet" href="{{url('assets/portal/css/team.css')}}">

        <!--Favicon-->
        <link rel="icon" type="image/png" href="{{url('assets/all/imgs/favicon.png')}}">
    </head>
    <body>

    <!-- header -->
    <div class="header" id="home">
        <div class="container">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +1 (407) 773-6937</li>
                <li></li>
                <li></li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@flooringtogo.net">info@flooringtogo.net</a></li>
        </div>
    </div>
    <!-- //header -->
    <!-- header-bot -->
    <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">

            <!-- header-bot -->
            <div class="col-md-5 logo_agile">
                <h1><a href="{{url('/')}}"><span>F</span>looring TOGO</a></h1>
            <!--  <img src="{{url('assets/portal/imgs/logo.png')}}" width="240" />-->
            </div>
            <!-- header-bot -->


            <div class="col-md-4 col-md-offset-3 header-middle">

                {!! Form::open(['route' => 'search.blog']) !!}
                {!! Form::text('key-search', null, ['placeholder' => 'Search here...']) !!}
                <button>
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                {!! Form::close() !!}
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header-bot -->
    <!-- banner -->
    <div class="ban-top">
        <div class="container">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li class="active menu__item menu__item--current">
                                    <a class="menu__link" href="{{url('/')}}">Home</a></a>
                                </li>

                                <li class=" menu__item">
                                    <a class="menu__link" href="{{url('empresa')}}">About</a>
                                </li>


                                <li class="dropdown">
                                    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Products  <b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        @foreach( $categories->all() as $category )
                                            <li><a href="{{url("/categoria/{$category->url}")}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>


                                </li>
                                <li class=" menu__item">
                                    <a class="menu__link" href="{{url('videos')}}">Installation</a>
                                </li>

                                <li class=" menu__item">
                                     <a class="menu__link" href="{{url('contato')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //banner-top -->

            @yield('content')


    <!-- footer -->
    <div class="footer">
        <div class="footer_agile_inner_info_w3l">
            <div class="col-md-4 footer-left">
                <h2><a href="index.html"><span>F</span>REE ESTIMATE NEW CUSTOMERS 10% OFF </a></h2>
                <p>
                    Please call us at +1 (407) 773-6937 , or complete our online in-home appointment form to set up a free visit by one of our trained flooring professionals. We offer next day installation on all flooring materials. Let us outfit your home or office today!
                </p>
                <ul class="social-nav model-3d-0 footer-social w3_agile_social two">
                    <li><a href="#" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="twitter">
                            <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="instagram">
                            <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                    <li><a href="#" class="pinterest">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                </ul>
            </div>
            <div class="col-md-8 footer-right">
                <div class="sign-grds">
                    <div class="col-md-6 sign-gd">

                    </div>

                    <div class="col-md-6 sign-gd-two">
                        <h4>Store <span>Information</span></h4>
                        <div class="w3-address">
                            <div class="w3-address-grid">
                                <div class="w3-address-left">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="w3-address-right">
                                    <h6>Phone Number</h6>
                                    <p>+1 (407) 773-6937</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="w3-address-grid">
                                <div class="w3-address-left">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="w3-address-right">
                                    <h6>Email Address</h6>
                                    <p>Email :<a href="mailto:info@flooringtogo.net">  info@flooringtogo.net</a></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="agile_newsletter_footer">
            <p class="copy-right">&copy 2017 Floorigntogo <a href="http://cloudmidia.com.br" target="_blank">Cloudmidia</a></p>


        </div>

    </div>
    </div>
    <!-- //footer -->


        <!--jQuery-->
        <script src="{{url('assets/all/js/jquery-3.1.1.min.js')}}"></script>

        <script src="{{url('assets/portal/js/modernizr.custom.js')}}"></script>
        <script src="{{url('assets/portal/js/minicart.min.js')}}"></script>

        <script>
            // Mini Cart
            paypal.minicart.render({
                action: '#'
            });

            if (~window.location.search.indexOf('reset=true')) {
                paypal.minicart.reset();
            }
        </script>

        <!-- //cart-js -->
        <!-- script for responsive tabs -->
        <script src="js/easy-responsive-tabs.js"></script>
        <script>
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true,   // 100% fit in a container
                    closed: 'accordion', // Start closed if in accordion view
                    activate: function(event) { // Callback function if tab is switched
                        var $tab = $(this);
                        var $info = $('#tabInfo');
                        var $name = $('span', $info);
                        $name.text($tab.text());
                        $info.show();
                    }
                });
                $('#verticalTab').easyResponsiveTabs({
                    type: 'vertical',
                    width: 'auto',
                    fit: true
                });
            });
        </script>
        <!-- //script for responsive tabs -->
        <!-- stats -->
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.countup.js"></script>
        <script>
            $('.counter').countUp();
        </script>
        <!-- //stats -->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/jquery.easing.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
        <!-- //here ends scrolling icon -->






    <!-- for bootstrap working -->
    <script src="{{url('assets/portal/js/bootstrap.js')}}"></script>


    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>

    @stack('scripts')

    </body>
</html>