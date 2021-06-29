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
                    <p style="font-size:24px!important;"><strong>Name:</strong> {{$order->name}}</p>
                    <p style="font-size:24px!important;"><strong>Category:</strong> {{$order->category}}</p>
                    <p style="font-size:24px!important;"><strong>Start:</strong> {{$order->start}}</p>
                    <p style="font-size:24px!important;"><strong>End:</strong> {{$order->end}}</p>
                    @if($order->details)
                        <p style="font-size:24px!important;"><strong>Details:</strong> {{$order->details}}</p>
                    @endif
                </div>
                <div class="col-md-12 text-center mt-5">
                   @if($order->alreadyBid)
                       <h2>Sorry but you already placed a bid on this job. <br>Please see it in your <a href="{{URL::to('dashboard')}}">dashboard</a></h2>
                       @else
                        <h1>Place your bid</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-3 text-left">
                                <form action="{{route('addBid')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$order->userId}}" name="placedBy">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="driverId">
                                    <input type="hidden" value="{{$order->id}}" name="orderId">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="Number" name="price" id="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" class="btn_1 medium gradient pulse_bt mt-2">Place Bid</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection
