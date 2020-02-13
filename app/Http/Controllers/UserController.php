<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shop;
use App\Address;
use willvincent\Rateable\Rating;
use Carbon\Carbon;

class UserController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth:admin');
    }*//********************vfdvdfbdfبيلاخاهايبهخلبءلايئبابيىابىيىيبىيبتىيتليبلت51515961695********************/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.show' , compact('users' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create' );
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
            'name' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users|email|string',
            'phone' => 'required|numeric',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password); 
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/avatars'), $filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect(route('user.index'))->with('message' , 'تم اضافة المستخدم بنجاح');
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
        $user = user::where('id' , $id)->first();
        return view('admin.user.edit' , compact('user'));
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
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $user = user::find($id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('image')) {
            @unlink('pictures/avatars/' . $user->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/avatars'), $filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect(route('user.index'))->with('message' , 'تم تحديث معلومات المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
//        Shop::where('user_id' , $id)->delete();
  //      Address::where('user_id' , $id)->delete();
        Rating::where('user_id' , $id)->delete();
        @unlink('pictures/avatars/' . $user->image);
        $user->delete();
        return redirect()->back()->with('message' , 'تم حذف المستخدم بنجاح');
    }

    public function delete($id)
    {
        $user = User::find($id);
        @unlink('pictures/avatars/' . $user->image);
        $user->image = null;
        $user->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
