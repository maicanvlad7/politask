@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
                <li class="breadcrumb-item active">{{Auth::user()->name}}</li>
                <li class="breadcrumb-item active">{{Auth::user()->type}}</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-envelope-open"></i>
                            </div>
                            <div class="mr-5">
                                @if(Auth::user()->type == 'basic')
                                    <h5>{{$data['totalOrders']}} Total Orders</h5>
                                @else
                                    <h5>{{$data['acceptedOrders']}} Accepted Orders</h5>
                                @endif
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="messages.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-star"></i>
                            </div>
                            <div class="mr-5">
                                @if(Auth::user()->type == 'basic')
                                    <h5>{{$data['ongoingOrders']}} Ongoing Orders</h5>
                                @else
                                    <h5>{{$data['totalBids']}} Total Bids</h5>
                                @endif

                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="reviews.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>{{Auth::user()->balance->balance}} $ Current Balance</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orders.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5>10 New Bookmarks!</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="bookmarks.html">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <h2></h2>
            @if(Auth::user()->type == 'basic')
                <div class="box_general">
                    <div class="header_box">
                        <h2 class="d-inline-block">Recent Orders</h2>
                        <div class="filter">
                            <div class="styled-select short">
                                <select name="orderby">
                                    <option value="Any time">Any time</option>
                                    <option value="Latest">Latest</option>
                                    <option value="Oldest">Oldest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="list_general">
                        <ul>
                            @foreach($data['orders'] as $order)
                                <li>
                                    <figure><img src="{{URL::to('img/logoPT.png')}}" alt=""></figure>
                                    <small>{{$order->category}}</small>
                                    <h4>{{$order->name}}</h4>
                                    <p>{{$order->details}}</p>
                                    <p><a href="{{URL::to('dashboard/order', ['orderId'=>$order->id])}}" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> View Order</a></p>
                                    <ul class="buttons">
                                        @if($order->accepted == 0)
                                            <li><a class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Accept Bid</a></li>
                                        @elseif($order->accepted == -1)
                                            <li><a class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Completed</a></li>
                                        @else
                                            <li><a class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Ongoing</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /box_general-->
                @else
                <div class="box_general">
                    <div class="header_box">
                        <h2 class="d-inline-block">Recent Bids</h2>
                        <div class="filter">
                            <div class="styled-select short">
                                <select name="orderby">
                                    <option value="Any time">Any time</option>
                                    <option value="Latest">Latest</option>
                                    <option value="Oldest">Oldest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="list_general">
                        <ul>
                            @foreach($data['bids'] as $bid)
                                <li>
                                    <figure><img src="{{URL::to('img/logoPT.png')}}" alt=""></figure>
                                    <small>{{$bid->created_at}}</small>
                                    <h4>$ {{$bid->price}}</h4>
                                    <p>{{$bid->comment}}</p>
                                    <p><a href="{{URL::to('dashboard/order', ['orderId'=>$bid->orderId])}}" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> View Bid Details</a></p>
                                    <ul class="buttons">
                                        @if($bid->accepted == 0)
                                            <li><a class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Bid Placed</a></li>
                                        @elseif($bid->accepted == 1)
                                            <li><a class="btn_1 red delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Bid Accepted</a></li>
                                        @else
                                            <li><a class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Completed</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /box_general-->
            @endif

        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

