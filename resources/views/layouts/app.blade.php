<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FooYes - Quality delivery or takeaway food">
    <meta name="author" content="Ansonika">
    <title>AnyDo - Te ajutam sa nu mai pierzi timpul!</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{URL::to('/')}}/img/favicon.ico" type="image/x-icon">
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ URL::to('/') }}/css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ URL::to('/') }}/css/home.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ URL::to('/') }}/css/custom.css" rel="stylesheet">
</head>

<body>

<header class="header black_nav clearfix element_to_stick">
    <div class="container">
        <div id="logo">
            <a href="{{ URL::to('/') }}/">
                <img src="{{ URL::to('/') }}/img/logoPT.png" width="120" height="80" alt="">
            </a>
        </div>
        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
        @if(Auth::check())
        <ul id="top_menu" class="drop_user">
            <li>
                <div class="dropdown user clearfix">
                    <a href="#" data-toggle="dropdown">
                        <figure><img src="{{ URL::to('/') }}/img/avatar1.jpg" alt=""></figure><span>{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-content">
                            <ul>
                                <li><a href=""></a><a href="">Balance: $ {{Auth::user()->balance->balance}}</a></li>
                                <li><a href="{{URL::to('dashboard')}}"><i class="icon_cog"></i>Dashboard</a></li>
                                <li><a href="#0"><i class="icon_document"></i>My Orders</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                        <i class="icon_key"></i> Logout
                                    </a>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /dropdown -->
            </li>
        </ul>
        @else
            <ul id="top_menu">
                <li title="Sign In"><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
            </ul>
        @endif

        <!-- /top_menu -->
        <a href="#0" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="{{ URL::to('/') }}/"><img src="{{ URL::to('/') }}/img/logo.svg" width="162" height="35" alt=""></a>
            </div>
            <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/join-riders') }}">Become a Tasker</a></li>
                <li><a href="{{ URL::to('/') }}">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- /header -->

@yield('content')

<footer>
    <div class="wave footer"></div>
    <div class="container margin_60_40 fix_mobile">

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <h3 data-target="#collapse_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="about.html">About us</a></li>
                        <li><a href="submit-restaurant.html">Become a tasker</a></li>
                        <li><a href="help.html">Join Corporate</a></li>
                        <li><a href="register.html">My account</a></li>
                        <li><a href="contacts.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 data-target="#collapse_3">Contact us!</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="icon_house_alt"></i>Cutier Alexandru 30A<br>Bucuresti - Romania</li>
                        <li><i class="icon_mobile"></i>+40 764 334 890</li>
                        <li><i class="icon_mail_alt"></i><a href="mailto:info@politask.ro">info@politask.ro</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div id="message-newsletter"></div>
                        <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
{{--                empty placeholder--}}
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">Terms and conditions</a></li>
                    <li><a href="#0">Privacy</a></li>
                    <li><span>© Poli Task</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->

<div id="toTop"></div><!-- Back to top button -->

<!-- Sign In Modal -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="modal_header">
        <h3>Sign in to your account</h3>
    </div>
    <form method="POST" action="{{route('login')}}" >
        @csrf
        <div class="sign-in-wrapper">
{{--            <a href="#0" class="social_bt facebook">Login with Facebook</a>--}}
{{--            <a href="#0" class="social_bt google">Login with Google</a>--}}
{{--            <div class="divider"><span>Or</span></div>--}}
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center">
                <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                Don’t have an account? <a href="{{ URL::to('/create-account') }}">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>
<!-- /Sign In Modal -->

<!-- COMMON SCRIPTS -->
<script src="{{ URL::to('/') }}/js/common_scripts.min.js"></script>
<script src="{{ URL::to('/') }}/js/common_func.js"></script>
<script src="{{ URL::to('/') }}/assets/validate.js"></script>

<!-- Cookie Bar -->
<script src="{{ URL::to('/') }}/js/jquery.cookiebar.js"></script>

{{--Sweet alert--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- SPECIFIC SCRIPTS -->
<script src="{{ URL::to('/') }}/js/wizard/wizard_scripts.js"></script>
<script src="{{ URL::to('/') }}/js/wizard/wizard_func.js"></script>
<script>
    $(document).ready(function() {
        'use strict';
        $.cookieBar({
            fixed: true
        });
    });
</script>


@if(Session::get('riderSuccess'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Almost there!',
                'An admin will verify the data you submitted and once the account is verified you will be notified.',
                'success'
            );
        });
    </script>
@endif

@if(Session::get('loginError'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Oops!',
                'Email or password was wrong. Please try again!',
                'error'
            );
        });
    </script>
@endif


@if(Session::get('orderAdded'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Thank you!',
                'The order has been placed. You can view it in your dashboard!',
                'success'
            );
        });
    </script>
@endif


@if(Session::get('bidAccepted'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Bid accepted!',
                'Money has been locked and the driver has been notified! You can see all the details in My Orders Tab.',
                'success'
            );
        });
    </script>
@endif

@if(Session::get('smallBalanceForBid'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Failed to accept bid!',
                'You don\'t have enough balance to accept the bid. Please refill your account.',
                'error'
            );
        });
    </script>
@endif

@if(Session::get('alreadyBid'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Sorry!',
                'You already placed a bid on this task. You can see it in your dashboard.',
                'error'
            );
        });
    </script>
@endif

@if(Session::get('bidAdded'))
    <script>
        $(document).ready(function(){
            Swal.fire(
                'Good luck!',
                'Your bid has been added. You will be notified if the user accepts your bid.',
                'success'
            );
        });
    </script>
@endif

<!-- Autocomplete -->
<script>
    function initMap() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        var end = document.getElementById('autocompleteEnd');
        var autocompleteEnd = new google.maps.places.Autocomplete(end);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });

        autocompleteEnd.addListener('place_changed', function() {
            var place = autocompleteEnd.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLwquYEyZ0fOJG70vt-EtVHg4t40ia9lA&libraries=places&callback=initMap"></script>
@if(isset($data['order']->id))
<script>

    function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var mapOptions = {
            zoom: 14,
            center: "{{$data['order']->start}}",
            styles: [
                { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                {
                    featureType: "administrative.locality",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry",
                    stylers: [{ color: "#263c3f" }],
                },
                {
                    featureType: "poi.park",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#6b9a76" }],
                },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{ color: "#38414e" }],
                },
                {
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [{ color: "#212a37" }],
                },
                {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#9ca5b3" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [{ color: "#746855" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [{ color: "#1f2835" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#f3d19c" }],
                },
                {
                    featureType: "transit",
                    elementType: "geometry",
                    stylers: [{ color: "#2f3948" }],
                },
                {
                    featureType: "transit.station",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{ color: "#17263c" }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#515c6d" }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.stroke",
                    stylers: [{ color: "#17263c" }],
                },
            ],
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        directionsRenderer.setMap(map);

        var request = {
            origin: "{{$data['order']->start}}",
            destination: "{{$data['order']->end}}",
            // Note that JavaScript allows us to access the constant
            // using square brackets and a string value as its
            // "property."
            travelMode: google.maps.TravelMode["DRIVING"]
        };
        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);
            }
        });
    }

</script>
@endif

@if(isset($order->id))
    <script>

        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            var mapOptions = {
                zoom: 14,
                center: "{{$order->start}}",
                styles: [
                    { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                    {
                        featureType: "administrative.locality",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "poi",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "geometry",
                        stylers: [{ color: "#263c3f" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#6b9a76" }],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [{ color: "#38414e" }],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry.stroke",
                        stylers: [{ color: "#212a37" }],
                    },
                    {
                        featureType: "road",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#9ca5b3" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry",
                        stylers: [{ color: "#746855" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry.stroke",
                        stylers: [{ color: "#1f2835" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#f3d19c" }],
                    },
                    {
                        featureType: "transit",
                        elementType: "geometry",
                        stylers: [{ color: "#2f3948" }],
                    },
                    {
                        featureType: "transit.station",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "water",
                        elementType: "geometry",
                        stylers: [{ color: "#17263c" }],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#515c6d" }],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.stroke",
                        stylers: [{ color: "#17263c" }],
                    },
                ],
            };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsRenderer.setMap(map);

            var request = {
                origin: "{{$order->start}}",
                destination: "{{$order->end}}",
                // Note that JavaScript allows us to access the constant
                // using square brackets and a string value as its
                // "property."
                travelMode: google.maps.TravelMode["DRIVING"]
            };
            directionsService.route(request, function(response, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(response);
                }
            });
        }

    </script>
@endif

</body>
</html>
