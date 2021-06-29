@extends('layouts.app')
@section('content')
<main>
    <div class="hero_single version_1">
        <div class="opacity-mask">
            <div class="container">
                <div class="row justify-content-lg-start ">
                    <div class="col-xl-7 col-lg-8">
                        <h1>No matter the task, we'll be right there for you</h1>
                        <p>Our taskers are among the best when it comes to customer service and package safety</p>
                            <div class="row">
                                <div class="col-lg-12">

                                    @if(Auth::check() )
                                        @if(Auth::user()->type!= 'basic')
                                            <a href="{{URL::to('')}}" class="btn_1 medium gradient pulse_bt mt-2">View Orders</a>
                                        @else
                                            <a href="{{URL::to('place-order')}}" class="btn_1 medium gradient pulse_bt mt-2">Place an order</a>
                                            <a href="{{URL::to('join-riders')}}" class="btn_1 medium gradient pulse_bt mt-2">Start earning</a>
                                        @endif
                                    @else
                                        <a href="{{URL::to('place-order')}}" class="btn_1 medium gradient pulse_bt mt-2">Place an order</a>
                                        <a href="{{URL::to('join-riders')}}" class="btn_1 medium gradient pulse_bt mt-2">Start earning</a>
                                    @endif
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="search_trends">
                                <h5>Trending:</h5>-
                                <ul>
                                    <li><a href="#0">Groceries</a></li>
                                    <li><a href="#0">House appliances</a></li>
                                    <li><a href="#0">Food</a></li>
                                    <li><a href="#0">Pizza</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="wave hero"></div>
    </div>
    <!-- /hero_single -->
@if(Auth::check())
    @if(Auth::user()->type == 'basic')
            <div class="container margin_30_60">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Recent Orders</h2>
                    <p>See your most recent order or place one right now!</p>
                </div>
                <!-- /main_title -->
                @if(count($data['orders']))
                    <div class="owl-carousel owl-theme categories_carousel">
                        @foreach($data['orders'] as $o)
                            <div class="item_version_2">
                                <a href="{{URL::to('/view-my-order', [$o->id])}}">
                                    <figure>
                                        <img src="img/orderImg.svg"  class="img-fluid" width="350" height="450">
                                        <div class="info">
                                            <h3>{{$o['name']}}</h3>
                                            <small>{{$o['start']}}</small>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @else
                    <div class="justify-content-center text-center">
                        <a href="{{URL::to('place-order')}}" class="btn_1 medium gradient pulse_bt mt-2">Place an order</a>
                    </div>
                @endif
                <!-- /carousel -->
            </div>
        @endif


{{--        <div class="bg_gray">--}}
{{--            <div class="container margin_60_40">--}}
{{--                <div class="main_title">--}}
{{--                    <span><em></em></span>--}}
{{--                    <h2>Top Rated Restaurants</h2>--}}
{{--                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>--}}
{{--                    <a href="#0">View All &rarr;</a>--}}
{{--                </div>--}}
{{--                <div class="row add_bottom_25">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="list_home">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_1.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>9.5</strong></div>--}}
{{--                                        <em>Italian</em>--}}
{{--                                        <h3>La Monnalisa</h3>--}}
{{--                                        <small>8 Patriot Square E2 9NF</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-30%</span></li>--}}
{{--                                            <li>Average price $35</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_2.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>8.0</strong></div>--}}
{{--                                        <em>Mexican</em>--}}
{{--                                        <h3>Alliance</h3>--}}
{{--                                        <small>27 Old Gloucester St, 4563</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-40%</span></li>--}}
{{--                                            <li>Average price $30</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_3.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>9.0</strong></div>--}}
{{--                                        <em>Sushi - Japanese</em>--}}
{{--                                        <h3>Sushi Gold</h3>--}}
{{--                                        <small>Old Shire Ln EN9 3RX</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-25%</span></li>--}}
{{--                                            <li>Average price $20</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="list_home">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_4.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>9.5</strong></div>--}}
{{--                                        <em>Vegetarian</em>--}}
{{--                                        <h3>Mr. Pepper</h3>--}}
{{--                                        <small>27 Old Gloucester St, 4563</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-30%</span></li>--}}
{{--                                            <li>Average price $20</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_5.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>8.0</strong></div>--}}
{{--                                        <em>Chinese</em>--}}
{{--                                        <h3>Dragon Tower</h3>--}}
{{--                                        <small>22 Hertsmere Rd E14 4ED</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-50%</span></li>--}}
{{--                                            <li>Average price $35</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="detail-restaurant.html">--}}
{{--                                        <figure>--}}
{{--                                            <img src="img/location_list_placeholder.png" data-src="img/location_list_6.jpg" alt="" class="lazy" width="350" height="233">--}}
{{--                                        </figure>--}}
{{--                                        <div class="score"><strong>8.5</strong></div>--}}
{{--                                        <em>Pizza - Italian</em>--}}
{{--                                        <h3>Bella Napoli</h3>--}}
{{--                                        <small>135 Newtownards Road BT4</small>--}}
{{--                                        <ul>--}}
{{--                                            <li><span class="ribbon off">-45%</span></li>--}}
{{--                                            <li>Average price $25</li>--}}
{{--                                        </ul>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /row -->--}}

{{--                <!-- /banner -->--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- /bg_gray -->
        @if(Auth::user()->type == 'rider')
            <div class="container margin_30_60">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Recently Placed Orders</h2>
                    <p>See all the orders and decide if you want to place a bid or not</p>
                </div>
                <!-- /main_title -->
                @if(count($data['orders']))
                    <div class="owl-carousel owl-theme categories_carousel">
                        @foreach($data['orders'] as $o)
                            <div class="item_version_2">
                                <a href="{{URL::to('/view-job', [$o->id])}}">
                                    <figure>
                                        <img src="img/orderImg.svg"  class="img-fluid" width="350" height="450">
                                        <div class="info">
                                            <h3>{{$o['name']}}</h3>
                                            <small>{{$o['start']}}</small>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 text-center mt-5">
                        <a class="btn_1 medium gradient pulse_bt mt-2">See All</a>
                    </div>
                @else
                    <div class="justify-content-center text-center">
                        <h4>There are no active orders yet! Please check in later.</h4>
                    </div>
            @endif
            <!-- /carousel -->
            </div>
        @endif
    @endif

    <!-- /container -->



    <div class="shape_element_2">
        <div class="container margin_60_0">
           @if(!Auth::check())
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_1.svg" alt="" width="150" height="167" class="lazy"></figure>
                                    <h3>Easily Order</h3>
                                    <p>Login and place an order. A courier will be at your door in no time! Just enjoy your time.</p>
                                </div>
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_2.svg" alt="" width="130" height="145" class="lazy"></figure>
                                    <h3>Quality Services</h3>
                                    <p>We made a promise to ourselves that we will deliver excellent services no matter what comes our way.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_3.svg" alt="" width="150" height="132" class="lazy"></figure>
                                    <h3>Enjoy quality time</h3>
                                    <p>Stop spending time on tidious tasks suchs as cleaning your carpet, let us handle it.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-center mt-3 d-block d-lg-none"><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
                    </div>
                    <div class="col-lg-5 offset-lg-1 align-self-center">
                        <div class="intro_txt">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Start Ordering Now</h2>
                            </div>
                            <p class="lead">Create an account and join the PoliTask family. You will forget what wasted time looks like. Bring your friends and gain countless discounts.</p>
                            <p>Promotion is available only for the first 5 friends you reffer.</p>
                            <p><a href="{{ URL::to('/create-account') }}" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                        </div>
                    </div>
                </div>
               @endif

            <div class="banner lazy" data-bg="url(img/bannerCover.jpg)">
                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div>
                        <small>PoliTask Food Delivery</small>
                        <h3>We Deliver fresh food to offices</h3>
                        <p>Enjoy your coffee and some doughnuts everyday.</p>
                        <a href="{{ URL::to('') }}" class="btn_1 gradient">Corporate Plan!</a>
                    </div>
                </div>
                <!-- /wrapper -->
            </div>
        </div>
    </div>
    <!-- /shape_element_2 -->

</main>
<!-- /main -->
@endsection
