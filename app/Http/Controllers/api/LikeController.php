<?php

namespace App\Http\Controllers\api;

use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:api');
         $this->middleware('auth:api')->except('add_like');
    }

    public function likes()
    {
        $user_id = Auth::user()->id;
        return Like::where('user_id' , $user_id)->with('flower')->get();
    }

    public function add_like(Request $request)
    {
        $flowerID = $request->flower_id;
        $userID = $request->user_id;
        $found = Like::where('flower_id', $flowerID)->where('user_id', $userID)->count();
        if ($found > 0) {
            Like::where('flower_id', $flowerID)->where('user_id', $userID)->delete();
            return response()->json(['message' => 'Unlike done',]);
        } else {
            $like = new Like();
            $like->flower_id = $flowerID;
            $like->user_id = $userID;
            $like->save();
            return response()->json(['message' => 'Like done',]);
        }
    }
}
