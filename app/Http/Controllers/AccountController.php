<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AccountController extends Controller
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

    public function submitAccount(Request $request)
    {

       $valid = Validator::make($request->all(), [
           'name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'email' => 'required|unique:users|max:255',
           'password' => 'required|max:255',
           'type' => 'required'
       ])->validate();

       $valid['password'] = Hash::make($valid['password']);

       $newUser = User::create($valid);

    }



    public function submitLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')
                ->where('email', $email)
                ->where('password', $password)
                ->first();

        if(isset($user->id))
        {
            if($user->type == 'basic')
            {
                Session::put('id', $user->id);
                Session::put('email', $user->email);
                Session::put('type', $user->type);
            }else{
                $verified = DB::table('drivers')
                        ->where('idUser')
                        ->first();

                if($verified->verified == 1)
                {
                    Session::put('id', $user->id);
                    Session::put('email', $user->email);
                    Session::put('type', $user->type);
                }
            }
        }else{
           die('asd');
        }
    }

    public function createRider(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'type' => 'required'
        ])->validate();

        $valid['password'] = Hash::make($valid['password']);

        $newUser = User::create($valid);


        $driverDataValid = Validator::make($request->all(), [
            'location' => 'required',
            'vehicle' => 'required',
            'idImage' => 'required',
            'telephone' => 'required',
            'age' => 'required',
            'gender' => 'required',
        ])->validate();

        $driverDataValid['idUser'] = $newUser->id;

        $driverDataValid['idImage'] = $newUser->id. 'id' . '.jpg';
        if($request->file('licenseImage')) {
            $driverDataValid['licenseImage'] = 'lic' . $newUser->id . '.jpg';
        }

        $newDriver = Driver::create($driverDataValid);

        //moving the image in the images folder
        $request->file('idImage')->storeAs('docs', $driverDataValid['idImage']);

        if($request->file('licenseImage'))
        {
            $request->file('licenseImage')->storeAs('docs', $driverDataValid['licenseImage']);
        }

        return back()
            ->with('riderSuccess','You have successfully upload image.');
    }


}
