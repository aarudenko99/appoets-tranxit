<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FLYER</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="{{ Setting::get('site_icon') }}"/>

    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div class="overlay" id="overlayer" data-toggle="offcanvas"></div>

        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li>
                </li>
                <li class="full-white">
                    <a href="{{ url('/register') }}">SIGN UP To RIDE</a>
                </li>
                <li class="white-border">
                    <a href="{{ url('/provider/register') }}">BECOME A DRIVER</a>
                </li>
                <li>
                    <a href="{{ url('/ride') }}">Ride</a>
                </li>
                <li>
                    <a href="{{ url('/drive') }}">Drive</a>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
                <li>
                    <a href="#">Privacy Policy</a>
                </li>
                <li>
                    <a href="#">Terms and Conditions</a>
                </li>
                <li>
                    <a href="{{ Setting::get('store_link_ios','#') }}"><img src="{{ asset('/asset/img/appstore-white.png') }}"></a>
                </li>
                <li>
                    <a href="{{ Setting::get('store_link_android','#') }}"><img src="{{ asset('/asset/img/playstore-white.png') }}"></a>
                </li>
            </ul>
        </nav>

        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                                <span class="hamb-top"></span>
                                <span class="hamb-middle"></span>
                                <span class="hamb-bottom"></span>
                            </button>

                            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('logo-black.jpg') }}"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li @if(Request::url() == url('/ride')) class="active" @endif>
                                    <a href="{{url('/ride')}}">Ride</a>
                                </li>
                                <li @if(Request::url() == url('/drive')) class="active" @endif>
                                    <a href="{{url('/drive')}}">Drive</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Help</a></li>
                                <li><a href="{{url('/login')}}">Signin</a></li>
                                <li><a class="menu-btn" href="{{url('/drive')}}">Become a Driver</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')
            <div class="page-content">
                <div class="footer row no-margin">
                    <div class="container">
                        <div class="footer-logo row no-margin">
                            <div class="logo-img">
                                <img src="{{ asset('logo-black.jpg') }}">
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul>
                                    <li><a href="#">Ride</a></li>
                                    <li><a href="#">Drive</a></li>
                                    <li><a href="#">Cities</a></li>
                                    <li><a href="#">Fare Estimate</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul>
                                    <li><a href="{{url('ride')}}">Signup to Ride</a></li>
                                    <li><a href="{{url('drive')}}">Become a Driver</a></li>
                                    <li><a href="{{url('ride')}}">Ride Now</a></li>                            
                                </ul>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h5>Get App on</h5>
                                <ul class="app">
                                    <li>
                                        <a href="{{Setting::get('store_link_ios','#')}}">
                                            <img src="{{asset('asset/img/appstore.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{Setting::get('store_link_android','#')}}">
                                            <img src="{{asset('asset/img/playstore.png')}}">
                                        </a>
                                    </li>                                                        
                                </ul>                        
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">                        
                                <h5>Connect us</h5>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row no-margin">
                            <div class="col-md-12 copy">
                                <p>&copy 2018 B!ENE Technologies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/js/scripts.js')}}"></script>

    @if(Setting::get('demo_mode', 0) == 1)
        <!-- Start of LiveChat (www.livechatinc.com) code -->
        <script type="text/javascript">
            window.__lc = window.__lc || {};
            window.__lc.license = 8256261;
            (function() {
                var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
                lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
            })();
        </script>
        <!-- End of LiveChat code -->
    @endif

    <script>
        var map;

        function initMap() {
            var uluru = { lat: 40.730610, lng: -73.935242 };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: 40.730610, lng: -73.935242 }
            });
            var contentString = '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<h4 id="firstHeading" class="firstHeading">Contact Us</h4>' +
                '<div id="bodyContent">' +
                '<p>Tamarai Tech Park, 12,16,' +
                'Jawaharlal Nehru Road,' +
                'Guindy,' +
                'Chennai,' +
                'Tamil Nadu 600032</p>' +
                '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                title: 'YOUR_TITLE'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
        </script>

        <script type="text/javascript" src="{{ asset('asset/js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMmFOC3-fpopsz5qA9zD7d-MzoqdrkKWQ&libraries=places&callback=initMap" async defer></script>

<script type="text/javascript">
    var current_latitude = 40.730610;
    var current_longitude = -73.935242;
</script>

<script type="text/javascript">
    if( navigator.geolocation ) {
       navigator.geolocation.getCurrentPosition( success, fail );
    } else {
        console.log('Sorry, your browser does not support geolocation services');
        initMap();
    }

    function success(position)
    {
        document.getElementById('long').value = position.coords.longitude;
        document.getElementById('lat').value = position.coords.latitude

        if(position.coords.longitude != "" && position.coords.latitude != ""){
            current_longitude = position.coords.longitude;
            current_latitude = position.coords.latitude;
        }
        initMap();
    }

    function fail()
    {
        // Could not obtain location
        console.log('unable to get your location');
        initMap();
    }
</script> 
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(".hamburger.is-closed").click(function(){
        jQuery("#sidebar-wrapper").toggleClass('active');
    });
</script>

 @yield('scripts')
</body>
</html>
