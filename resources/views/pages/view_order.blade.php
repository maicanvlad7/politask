@extends('layouts.app')
@section('content')
    <main>
        <div class="container" style="margin-top: 10vh;">
            <div class="row ">
                <div class="col-md-12 text-center">
                    <h1>View order details</h1>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-xs-10 mt-5" id="map" style="min-height:35vh!important;">

                </div>
                <div class="col-md-12 mt-5">
                    <h2>Order info</h2>
                    <p style="font-size:24px!important;"><strong>Name:</strong> {{$data['order']->name}}</p>
                    <p style="font-size:24px!important;"><strong>Category:</strong> {{$data['order']->category}}</p>
                    <p style="font-size:24px!important;"><strong>Start:</strong> {{$data['order']->start}}</p>
                    <p style="font-size:24px!important;"><strong>End:</strong> {{$data['order']->end}}</p>
                    @if($data['order']->details)
                        <p style="font-size:24px!important;"><strong>Details:</strong> {{$data['order']->details}}</p>
                    @endif
                </div>
                @if($data['order']->accepted == 0)
                <div class="col-md-12 text-center mt-5">
                    <h1>Current Bids</h1>
                    <div class="row">
                        @foreach($data['bids'] as $bid)
                            <div class="col-md-3 col-sm-6 col-6">
                                <a class="box_topic" href="#0">
                                    <i class="icon-food_icon_highlight"></i>
                                    <h4>{{$bid->user->name}} {{$bid->user->last_name}}</h4>
                                    <h3>Price: {{$bid->price}} $</h3>
                                    <p>Comment: {{$bid->comment}}</p>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <button id="acceptBid" class="btn_1 medium outline pulse_bt mt-2" onclick="location.href='{{URL::to('accept-bid', ['bidId'=>$bid->id])}}'">Accept Bid</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                    @else
                    <div class="col-md-12 text-center mt-5">
                        <h3 class="text-success">You already accepted a bid for this order. <br>Thank you for using Poli Task !</h3>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
