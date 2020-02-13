<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\PayUserNotification;
use App\Pay;
use App\Flower;
use App\Order;
use App\ShoppingCart;
use App\User;
use App\Address;
use App\Additionpay;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $pays = Pay::all();
        $orders = Order::all();
        return view('admin.pay.show' , compact('users' , 'pays','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pays = Pay::find($id);
        $carts = ShoppingCart::where('pay_id' , $id)->get();
        $order = Order::where('pay_id' , $id)->first();
        $addr = Address::where('id' , $pays->address_id)->first();
        $additions = Additionpay::where('pay_id' , $id)->get();
        return view('admin.pay.see' , compact('pays' , 'carts','order' , 'addr' , 'additions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = Pay::find($id);
        Order::where('pay_id' , $id)->delete();
        @unlink('pictures/pays/' . $pay->image);
        $pay->delete();

        return redirect()->back();
    }
}
