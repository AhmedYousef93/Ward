<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ShopNotification;
use App\User;
use App\Country;

use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shop.show', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        $userIds = [];
        foreach ($shops as $shop) {
           array_push($userIds, $shop->user_id);
        }
        $users = User::whereNotIn('id', $userIds)->get();
        $countries = Country::all();
        return view('admin.shop.create' , compact('users', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
        ]);
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->body = $request->body;
        $shop->all_week = $request->all_week;
        $shop->friday = $request->friday;
        $shop->status = $request->status;
        $shop->best = $request->best;
        $shop->country_id = $request->country_id;
        $shop->user_id = $request->user_id;
        $shop->address = $request->address;
        // $shop->lng = $request->lng;
        // $shop->lat = $request->lat;
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/shops'), $filename);
            $shop->image = $filename;
        }
        $shop->save();
        return redirect(route('shop.index'))->with('message' , 'تم اضافة المحل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::with('user')->find($id);
        $countries = Country::all();
        return view('admin.shop.edit', compact('shop', 'countries'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        
        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->status = $request->status;
        $shop->body = $request->body;
        $shop->all_week = $request->all_week;
        $shop->friday = $request->friday;
        $shop->best = $request->best;
        $shop->country_id = $request->country_id;
        $shop->address = $request->address;
        // $shop->lng = $request->lng;
        // $shop->lat = $request->lat;
        if ($request->hasFile('image')) {
            @unlink('pictures/shops/' . $shop->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/shops'), $filename);
            $shop->image = $filename;
        }
        if($shop->status == 1){
            $usershop = User::where('id' , $shop->user->id)->first();
            $usershop->shop == 1 ;
            $usershop->save();
        }
        $shop->save();
        
        $user = User::where('id' , $shop->user->id)->first();
        $user->shop = 1;
        $user->save();
        $user->notify(new ShopNotification($shop));
        
        return redirect()->back()->with('message' , 'تم تعديل بيانات المحل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        @unlink('pictures/shops/' . $shop->image);
        $shop->delete();
        return redirect()->back()->with('message' , 'تم حذف المحل بنجاح');
    }
    public function delete($id)
    {
        $shop = Shop::find($id);
        @unlink('pictures/shops/' . $shop->image);
        $shop->image = null;
        $shop->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }

}
