<?php

namespace App\Http\Controllers\api;

use App\Address;
use App\Flower;
use App\Shop;
use App\Card;
use App\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notification;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    
    public function __construct()
    {
       // $this->middleware('auth:api');
         $this->middleware('auth:api')->except('search', 'addresses','cards','country','nearshops');
    }
    
    public function search(Request $request)
    {
        $word = $request->word;
        $flowers =  Flower::where('status', 1)->where('name', 'LIKE', "%$word%")->get();
        $shops =  Shop::where('status', 1)->where('name', 'LIKE', "%$word%")->get();
        return response()->json(['flowers' => $flowers , 'shops' => $shops], 201);
    }

    public function addressSave(Request $request)
    {
        $address = new Address();
        $address->user_id = Auth::user()->id;
        $address->street = $request->street;
        $address->home_num = $request->home_num;
        $address->guide_place = $request->guide_place;
        $address->address = $request->address;
        $address->country_id = $request->country_id;
        $address->save();
        return response()->json(['status' => 'success'], 201);
    }

    public function addressEditSave(Request $request, $addressID)
    {
        $address = Address::find($addressID);
        if ($address->user_id == Auth::user()->id) {
            $address->street = $request->street;
            $address->home_num = $request->home_num;
            $address->guide_place = $request->guide_place;
            $address->address = $request->address;
            $address->country_id = $request->country_id;
            $address->save();
            return response()->json(['status' => 'success'], 201);
        } else {
            return 'thats not your adrees';
        }
    }

    public function addressDelete($addressID)
    {
        $address = Address::find($addressID);
        if ($address->user_id == Auth::user()->id) {
            $address->delete();
            return response()->json(['status' => 'success'], 201);
        } else {
            return 'thats not your adrees';
        }
    }

    public function addresses($userid)
    {
        $addresses =  Address::where('user_id', $userid)->get();
        return response()->json([ 'addresses' => $addresses], 200);
    }
    
    
    public function cards()
    {
        return Card::all();
    }
    public function notification()
    {
        return Notification::where('notifiable_id' , Auth::user()->id)->where('notifiable_type' , 'App\Admin')->get();
    }
    public function country()
    {
        return Country::all();
    }
    

}
