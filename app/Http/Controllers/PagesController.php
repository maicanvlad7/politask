<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $data = array();

        if(Auth::check() && Auth::user()->type == 'basic')
        {
            $data['orders'] = Order::where('userId',Auth::user()->id)->where('accepted', '0')->get();
        }else if(Auth::check() && Auth::user()->type == 'rider')
        {
            $data['orders'] = Order::where('accepted', '0')->get();
        }

        return view('pages.home', compact('data'));
    }

    public function createAccount()
    {
        return view('pages.register');
    }

    public function loginPage()
    {
        return view('pages.login');
    }

    public function becomeRider()
    {
        return view('pages.rider');
    }

    public function placeOrder()
    {
        if(!Auth::check())
        {
            return view('pages.login');
        }else{
            return view('pages.place_order');
        }

    }
}
