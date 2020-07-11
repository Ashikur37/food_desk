<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$setting->site_name}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{URL::to('/')}}/images/{{$setting->fav_icon}}">
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{URL::to('/')}}/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Elegent CSS -->
    <link href="{{URL::to('/')}}/assets/css/elegent.min.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{URL::to('/')}}/assets/css/plugins.css" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{URL::to('/')}}/assets/css/helper.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{URL::to('/')}}/assets/css/main.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="{{URL::to('/')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/toastr/toastr.min.css">


</head>

<body>
    <!--=============================================
	=            Header         =
	=============================================-->

    <header>
        <!--=======  header bottom  =======-->

        <div class="header-bottom header-bottom-one header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 text-lg-left text-md-center text-sm-center">
                        <!-- logo -->
                        <div class="logo mt-15 mb-15">
                            <a href="index.html">
                                <img src="{{URL::to('/')}}/images/{{$setting->logo}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <!-- end of logo -->
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
                            <!-- header phone number -->
                            <div class="header-contact d-flex">
                            </div>
                            <!-- end of header phone number -->

                            <!-- shopping cart -->
                            <div class="shopping-cart" id="shopping-cart">

                            </div>
                        </div>

                        <!-- navigation section -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
                                    <li><a href="{{route('myAccount')}}">My account</a></li>
                                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                    <li><a href="{{route('myAccount')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- end of navigation section -->
                    </div>
                    <div class="col-12">
                        <!-- Mobile Menu -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of header bottom  =======-->
    </header>

    <!--=====  End of Header  ======-->

    @yield('content')



    <!--=============================================
	=            Footer         =
	=============================================-->

    <footer>
        <!--=======  newsletter section  =======-->

        <div class="newsletter-section pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-sm-20 mb-xs-20">
                        <!--=======  newsletter title =======-->

                        <div class="newsletter-title">
                            <h1>
                                <img src="{{URL::to('/')}}/assets/images/icon-newsletter.png" alt=""> Send Newsletter
                            </h1>
                        </div>

                        <!--=======  End of newsletter title  =======-->
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!--=======  subscription-form wrapper  =======-->

                        <div class="subscription-form-wrapper d-flex flex-wrap flex-sm-nowrap">
                            <p class="mb-xs-20">Sign up for our newsletter to get up-to-date from us</p>
                            <div class="subscription-form">
                                <form id="mc-form" class="mc-form subscribe-form">
                                    <input type="email" id="mc-email" autocomplete="off" placeholder="Your email address">
                                    <button id="mc-submit" type="submit"> subscribe!</button>
                                </form>

                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts">
                                    <div class="mailchimp-submitting"></div>
                                    <!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div>
                                    <!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div>
                                    <!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                        </div>

                        <!--=======  End of subscription-form wrapper  =======-->
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of newsletter section  =======-->

        <!--=======  social contact section  =======-->

        <div class="social-contact-section pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
                        <!--=======  social media links  =======-->

                        <div class="social-media-section">
                            <h2>Follow us</h2>
                            <div class="social-links">
                                <a class="facebook" href="http://www.facebook.com" data-tooltip="Facebook"><i
                                        class="fa fa-facebook"></i></a>
                                <a class="twitter" href="http://www.twitter.com" data-tooltip="Twitter"><i
                                        class="fa fa-twitter"></i></a>
                                <a class="instagram" href="http://www.instagram.com" data-tooltip="Instagram"><i
                                        class="fa fa-instagram"></i></a>
                                <a class="linkedin" href="http://www.linkedin.com" data-tooltip="Linkedin"><i
                                        class="fa fa-linkedin"></i></a>
                                <a class="rss" href="http://www.rss.com" data-tooltip="RSS"><i
                                        class="fa fa-rss"></i></a>
                            </div>
                        </div>

                        <!--=======  End of social media links  =======-->

                    </div>
                    <div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
                        <!--=======  contact summery  =======-->

                        <div class="contact-summery">
                            <h2>Contact us</h2>

                            <!--=======  contact segments  =======-->

                            <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">
                                <!--=======  single contact  =======-->

                                <div class="single-contact d-flex mb-xs-20">
                                    <div class="icon">
                                        <span class="icon_pin_alt"></span>
                                    </div>
                                    <div class="contact-info">
                                        <p>Address: <span>123 New Design Str, Melbourne, Australia</span></p>
                                    </div>
                                </div>

                                <!--=======  End of single contact  =======-->
                                <!--=======  single contact  =======-->

                                <div class="single-contact d-flex mb-xs-20">
                                    <div class="icon">
                                        <span class="icon_mobile"></span>
                                    </div>
                                    <div class="contact-info">
                                        <p>Phone: <span>1-888-123-456-89</span></p>
                                    </div>
                                </div>

                                <!--=======  End of single contact  =======-->
                                <!--=======  single contact  =======-->

                                <div class="single-contact d-flex">
                                    <div class="icon">
                                        <span class="icon_mail_alt"></span>
                                    </div>
                                    <div class="contact-info">
                                        <p>Email: <span>support@hastech.company</span></p>
                                    </div>
                                </div>

                                <!--=======  End of single contact  =======-->
                            </div>

                            <!--=======  End of contact segments  =======-->



                        </div>

                        <!--=======  End of contact summery  =======-->

                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of social contact section  =======-->

        <!--=======  copyright section  =======-->

        <div class="copyright-section pt-35 pb-35">
            <div class="container">
                <div class="row align-items-md-center align-items-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
                        <!--=======  copyright text	  =======-->

                        <div class="copyright-segment">
                            <p>
                                <a href="#">Privacy Policy</a>
                                <span class="separator">|</span>
                                <a href="#">Term and conditions</a>
                            </p>
                            <p class="copyright-text">&copy; 2019 <a href="/">Greenfarm</a>. All Rights Reserved</p>
                        </div>

                        <!--=======  End of copyright text	  =======-->

                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                        <!--=======  payment info  =======-->

                        <div class="payment-info text-center text-md-right">
                            <p>Allow payment base on <img src="{{URL::to('/')}}/assets/images/payment-icon.png" class="img-fluid" alt=""></p>
                        </div>

                        <!--=======  End of payment info  =======-->

                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of copyright section  =======-->
    </footer>

    <!--=====  End of Footer  ======-->



    <!-- scroll to top  -->
    <a href="#" class="scroll-top"></a>
    <!-- end of scroll to top -->

    <!-- JS
	============================================ -->
    <!-- jQuery JS -->
    <script src="{{URL::to('/')}}/assets/js/vendor/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="{{URL::to('/')}}/assets/js/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{URL::to('/')}}/assets/js/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="{{URL::to('/')}}/assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="{{URL::to('/')}}/assets/js/main.js"></script>
    <script src="{{asset('/')}}/admin/plugins/toastr/toastr.min.js"></script>
    <script src="{{asset('/')}}/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
    viewMode=null;
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            
            @if(Session::has('error'))

            toastr.error("{{Session::get('error')}}");
            @endif
        })
        $.ajax({
            url: `{{URL::to('get-cart')}}`,
            success: function(result) {
                $("#shopping-cart").html(result);
            }
        })
        updateCartHeader = () => {
            $.ajax({
                url: `{{URL::to('get-cart')}}`,
                success: function(result) {
                    $("#shopping-cart").html(result);
                }
            })
        }
        removeCartGlobal = (id) => {
            $.ajax({
                url: `{{URL::to('remove-cart')}}?id=${id}`,
                success: function(result) {
                    toastr.warning('Item removed from cart')
                    $.ajax({
                        url: `{{URL::to('get-cart')}}`,
                        success: function(result) {
                            $("#shopping-cart").html(result);
                        }
                    })

                }
            });
        }
    </script>
    @yield("script")
</body>

</html>
