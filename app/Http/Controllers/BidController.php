<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bid;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    //

    public function addBid(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'placedBy' => 'required|max:255',
            'driverId' => 'required|max:255',
            'orderId' => 'required|max:255',
            'price' => 'required|max:255',
            'comment' => 'required'
        ])->validate();

        $alreadyBid = Bid::where('driverId', $valid['driverId'])
                ->where('orderId', $valid['orderId'])
                ->count();

        if($alreadyBid)
        {
            return back()->with('alreadyBid', 'true');
        }

        if(Bid::create($valid)){
            return back()->with('bidAdded', 'true');
        }
    }

    public function acceptBid($bidId)
    {
        $bid = Bid::where('id', $bidId)->first();

        if(Auth::user()->balance->balance > $bid->price)
        {
            // scadem mai intai din balance al userului
            Balance::where('userId', Auth::user()->id)->decrement('balance', $bid->price);
            // punem in locked balance la driver pana cand e gata taskul
            Balance::where('userId', $bid->driverId)->increment('locked', $bid->price);
            //marcam taskul ca fiind acceptat si nu il mai listam in prima pagina
            Order::where('id', $bid->orderId)->update(['accepted'=>$bid->driverId]);
            //marcam bidul ca fiind acceptat
            Bid::where('id', $bid->id)->update(['accepted'=>1]);
            //dam redirect cu flash data in sesiune
            return back()->with('bidAccepted','1');
        }else{
            //redirect cu eroare in sesiune ca nu are destui bani, bad luck
            return back()->with('smallBalanceForBid','1');
        }
    }
}
