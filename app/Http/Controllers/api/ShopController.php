<?php

namespace App\Http\Controllers\api;

use App\Admin;
use App\Notifications\CreateshopNotification;
use App\Shop;
use App\Shopcomment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use willvincent\Rateable\Rating;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show' ,'best' , 'rate', 'showcomment','nearshops');
    }
    public function index()
    {
        return Shop::where('status' , 1)->get();
    }

    public function show($id)
    {
        return Shop::where('status' , 1)->find($id);
    }

    public function best()
    {
        return Shop::where('status' , 1)->where('best' , 1)->paginate(5);
    }
    public function comment(Request $request , $shop_id)
    {
        $rating = new Rating();
        $rating->rating = $request->rate;
        $rating->rateable_id = $shop_id;
        $rating->rateable_type = 'App\Shop';
        $rating->user_id = Auth::user()->id;
        $rating->save();

        $shopcomment = new Shopcomment();
        $shopcomment->comment = $request->comment;
        $shopcomment->user_id = Auth::user()->id;
        $shopcomment->shop_id = $shop_id;
        $shopcomment->rate_id = $rating->id;
        $shopcomment->save();

        $admin = Admin::find(1);
        $admin->notify(new ShopcomNotification($shopcomment));

        return response()->json(['status' => 'success'], 201);
    }
    
    public function rate($shop_id)
    {
        return Rating::where('rateable_id' , $shop_id)->get();
    }
    
    public function showcomment($shop_id)
    {
        return Shopcomment::with('user' , 'rate')->where('shop_id' , $shop_id)->get();
    }
    
    public function add(Request $request)
    {
        $shop = new Shop;
        $shop->name = $request->name;
        $shop->user_id = Auth::user()->id;
        $shop->body = $request->body;
        $shop->all_week = $request->all_week;
        $shop->friday = $request->friday;
        $shop->address = $request->address;
        $shop->country_id = $request->country_id;
        $shop->lng = $request->lng;
        $shop->lat = $request->lat;
        $picture = $request->image;
        $upload_path= base_path() . "/public/pictures/shops/$request->date.jpg";
        file_put_contents($upload_path,base64_decode($picture));
        $shop->image = "$request->date.jpg";
        $shop->save();
        
        $admin = Admin::find(1);
        $admin->notify(new CreateshopNotification($shop));
        
        return response()->json(['status' => 'success'], 201);
    }
    public function nearshops(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        return Shop::whereBetween('lat', array(round($lat - 3), round($lat + 3)))
            ->whereBetween('lng', array(round($lng - 3), round($lng + 3)))
            ->get();
    }
    
}
