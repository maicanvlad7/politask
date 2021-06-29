@extends('layouts.admin')

@section('content')
    <head>
        <style>
            p{
                font-size: 16px!important;
            }
        </style>
    </head>
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
                <li>View Order Details</li>
            </ol>
            <!-- Icon Cards-->
            <!-- /cards -->
            <h2></h2>
            @if(Auth::user()->type == 'basic')
                <div class="row">
                    <div class="col-md-6">
                        <div class="box_general">
                            <div class="header_box">
                                <h2 class="d-inline-block">Order details for <span style="color: orangered!important;">{{$data['order']->name}}</span>
                                    <a href="{{URL::to('view-my-order', ['orderId'=>$data['order']->id])}}" class="btn btn-danger" target="_blank">View Bids</a></h2>
                                <p class="mt-5">Placement Date: {{$data['order']->created_at}}</p>
                                <p>Category: {{$data['order']->category}}</p>
                                <p>Name: {{$data['order']->name}}</p>
                                <p>Start Location: {{$data['order']->start}}</p>
                                <p>End Location: {{$data['order']->end}}</p>
                                @if(isset($data['order']->details))
                                    <p>Details: {{$data['order']->details}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(isset($data['acceptedBid']))
                        <div class="col-md-6">
                            <div class="box_general">
                                <div class="header_box">
                                    <h2 class="d-inline-block">You accepted the bid of <span style="color: orangered!important;">{{$data['acceptedBid']->user->name}}</span></h2>
                                    <p class="mt-5">Name: {{$data['acceptedBid']->user->name}} {{$data['acceptedBid']->user->last_name}}</p>
                                    <p>Age: {{$data['driver']->age}}</p>
                                    <p>Vehicle Type: {{$data['driver']->vehicle}}</p>
                                    <p>Tasker Actions:</p><br>
                                    <a class="btn btn-success mb-5" href="tel:{{$data['driver']->telephone}}">Call</a>
                                    <a class="btn btn-info mb-5" href="mailto:{{$data['acceptedBid']->user->email}}">Email</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /box_general-->
            @else
               <div class="row">
                   <div class="col-md-6">
                       <div class="box_general">
                           <div class="header_box">
                               <h2 class="d-inline-block">Details about your accepted bid on task <span style="color:orangered">{{$data['order']->name}}</span></h2>
                               <p class="mt-5">Placement Date: {{$data['order']->created_at}}</p>
                               <p>Category: {{$data['order']->category}}</p>
                               <p>Name: {{$data['order']->name}}</p>
                               <p>Start Location: {{$data['order']->start}}</p>
                               <p>End Location: {{$data['order']->end}}</p>
                               @if(isset($data['order']->details))
                                   <p>Details: {{$data['order']->details}}</p>
                               @endif

                               <h4>Bid Details</h4>
                               <p>Price: {{$data['bidDetails']->price}}</p>
                               <p>Comment: {{$data['bidDetails']->comment}}</p>

                               @if(isset($data['acceptedBid']) && $data['acceptedBid']->accepted == 1)
                                   <a href="{{URL::to('dashboard/finish-order',[ 'orderId'=>$data['order']->id,'bidId'=>$data['acceptedBid']->id ])}}" class="btn btn-danger">Finish Task</a>
                               @endif

                           </div>
                       </div>
                   </div>
                   @if(isset($data['acceptedBid']) && $data['acceptedBid']->accepted == 1)
                   <div class="col-md-6">
                       <div class="box_general">
                           <div class="header_box">
                               <h2 class="d-inline-block">Live order Map</h2>
                               <div id="map" style="min-height: 32vh!important;">

                               </div>
                               <a href="" class="btn btn-info mt-5"  >Open Navigation In Maps</a>
                           </div>
                       </div>
                   </div>
                   @endif
               </div>
                <!-- /box_general-->
            @endif

        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

