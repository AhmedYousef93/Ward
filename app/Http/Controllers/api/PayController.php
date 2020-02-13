<?php

namespace App\Http\Controllers\api;

use App\Address;
use App\Admin;
use App\Notifications\PayNotification;
use App\Order;
use App\Pay;
use App\Additionpay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function pay_flower(Request $request)
    {
       
        $pay = new Pay;
        $pay->user_name = $request->user_name;
        if($request->status == 0 ){
        $pay->status = $request->status;
        }else{
        $pay->status = $request->status;
        $pay->iban = $request->iban;
        $pay->bank_id = $request->bank_id;
        $picture = $request->image;
        $upload_path= base_path() . "/public/pictures/pays/$request->date.jpg";
        file_put_contents($upload_path,base64_decode($picture));
        $pay->image = "$request->date.jpg";
        }
        if(isset($request->address)){
            $pay->address = $request->address;
            $pay->address_id =0;
        }else{
            $pay->address_id =$request->address_id;
        }
        $pay->user_id = Auth::user()->id;
        $pay->total_price = $request->total_price;
        $pay->save();
        $json =  json_decode($request->flowers, true);
        foreach ($json as $value) {
            $order = new Order();
            $order->pay_id = $pay->id;
            $order->card_id = $value['card_id'];
            $order->card_text = $value['card_text'];
            $order->flower_id = $value['flower_id'];
            $order->flowersize_id = $value['flowersize_id'];
            $order->qty = $value['qty'];
            $order->save();
        }
        $json1 =  json_decode($request->additions, true);
        foreach ($json1 as $value) {
            $additionpay = new Additionpay();
            $additionpay->pay_id = $pay->id;
            $additionpay->addition_id = $value;
            $additionpay->save();
        }

        $admin = Admin::find(1);
        $admin->notify(new PayNotification($pay));
        return response()->json(['status' => 'success'], 201);
    }

}

