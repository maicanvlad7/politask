<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bid;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //daca e basic
            //aducem toate comenzile
            //aducem comenzi active (care sunt acceptate adica)
        if(Auth::user()->type == 'basic')
        {
            $data = array(
                'totalOrders' => Order::where('userId',Auth::user()->id)->count(),
                'ongoingOrders' => Order::where('userId',Auth::user()->id)->where('accepted','!=','0')->count(),
                'orders' => Order::where('userId', Auth::user()->id)->get(),
            );
        }else if(Auth::user()->type == 'rider')
        {
            $data = array(
                'acceptedOrders' => Order::where('accepted', Auth::user()->id)->count(),
                'totalBids' => Bid::where('driverId', Auth::user()->id)->count(),
                'bids' => Bid::where('driverId', Auth::user()->id)->get(),
            );
        }
        //daca e rider
            //aducem comenzi active
            //aducem bid-uri active de la comenzi care sunt active (Accepted != 0 )
        return view('admin.index', compact('data'));
    }

    public function order($orderId)
    {
        $data = array();

        if(Auth::user()->type == 'basic')
        {
            $data['order'] = Order::where('id', $orderId)->first();

            if($data['order']->accepted != 0)
            {
                $data['acceptedBid'] = Bid::where('orderId', $orderId)->where('accepted','1')->first();
                $data['driver'] = Driver::where('idUser', $data['order']->accepted)->first();
            }
        }else{
            $data['order'] = Order::where('id', $orderId)->first();
            $data['bidDetails'] = Bid::where('orderId', $orderId)->where('driverId', Auth::user()->id)->first();

            if($data['order']->accepted == Auth::user()->id)
            {
                $data['acceptedBid'] = Bid::where('orderId', $orderId)->where('driverId', Auth::user()->id)->first();
            }
        }

        return view('admin.order', compact('data'));
        //daca este basic aducem data despre comanda si despre driver
        //in template punem buton de call si tot ce trebuie

        //daca este rider aducem detalii despre comanda
        //in template punem si termina comanda
    }

    public function finishOrder($orderId, $bidId)
    {
        $order = Order::where('id', $orderId)->first();

        $balance = Balance::where('userId', $order->accepted)->first();

        Order::where('id', $orderId)->update(['accepted'=>'-1']);
       //punem status la order -1

        $bid = Bid::where('id', $bidId)->first();

        $balance->decrement('locked',$bid->price);
        $balance->increment('balance',$bid->price);
        //scaotem din locked balance echivalentul valorii bidului
        //punem in balance ce am scos din echivalentul valorii bidului

        return back()->with('finishOk','1');
    }

    public function profile()
    {
        return view('admin.profile');
    }



}
