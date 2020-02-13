<?php

namespace App\Http\Controllers;

use App\Addition;
use App\Admin;
use App\Category;
use App\Notification;
use Illuminate\Http\Request;
use App\Notifications\MailNotification;
use App\Flower;
use App\User;
use App\Shop;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
       
        
        $fuser = User::paginate(5);
        $user = User::all();
        $category = Category::all();
        $admin = Admin::find(1);
        $flowers = Flower::all();
        $fflowers = Flower::paginate(5);
        $fadditions = Addition::paginate(5);
        $additions = Addition::all();
        $shops = Shop::paginate(5);
        $paynots = Notification::where('type', 'App\Notifications\PayNotification')->count();
        $usernots = Notification::where('type', 'App\Notifications\UserNotification')->count();
        return view('admin.home' , compact( 'additions','flowers','user' , 'category' , 'admin' ,'paynots','usernots','fuser','fflowers','fadditions'));
    }

    public function deletenot(Request $request)
    {
        $adID = $request->input('adID');
        \App\Notification::where('id' , $adID)->delete();
        return response()->json(['status' => 'error'], 500);
    }
}
