<?php

namespace App\Http\Controllers\api;

use App\Bank;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show' , 'bank');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
        return User::find($id);
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
        //
    }

    public function profileEditSave(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'min:6',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->image){
        $image = $request->image;
        $upload_path= base_path() . "/public/pictures/avatars/$request->date.jpg";
        file_put_contents($upload_path,base64_decode($image));
        $user->image = "$request->date.jpg";
        }
        $user->save();
        return response()->json($user, 200);
    }
    public function bank()
    {
        return Bank::all();
    }
}
