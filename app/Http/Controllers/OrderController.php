<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:orders|max:255',
            'category' => 'required|max:255',
            'start' => 'required|max:255',
            'end' => 'required|max:255',
            'details' => 'required',
            'userId' => 'required'
        ])->validate();

        if(Order::create($valid)){
            return back()->with('orderAdded', 'true');
        }
    }

    public function viewOrder($orderId)
    {

        $data = array(
            'order' => Order::where('id', $orderId)->first(),
            'bids' => Bid::where('orderId', $orderId)->get()
        );


        if($data['order']->userId == Auth::user()->id)
        {
            return view('pages.view_order', compact('data'));
        }

        redirect('/login-account');

    }

    public function viewJob($orderId)
    {
        $bid = Bid::where('orderId', $orderId)->where('driverId', Auth::user()->id)->count();

        $order = Order::where('id', $orderId)->first();
        if($bid)
        {
            $order->alreadyBid = 1;
        }else{
            $order->alreadyBid = 0;
        }

        if(isset($order))
        {
            return view('pages.view_job', compact('order'));
        }

        redirect('/login-account');






    }
}
