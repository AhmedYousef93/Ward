<?php

namespace App\Http\Controllers\api;

use App\Flower;
use App\Admin;
use App\Shop;
use App\Flowercomment;
use App\Flowerimage;
use App\Flowersize;
use App\Notifications\FlowercomNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FlowersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','newst', 'show' ,'best' , 'showcomment','showdesigner','showcategory','showsalary','showsku','showname','showleng','showwidt','showbest','showstatus');
    }


 public function index(){
        return flower::orderBy('id','desc')->paginate(5);
    }
    public function show($id){
        return flower::find($id);
    }
    // id  is  anumber here belong to designer and categogry in own database 
     public function showdesigner($id){
        //return flower::where('id', $flower->designer_id);
      return   flower::where('designer_id',$id)->first(); 

    }
     public function showcategory($id){
      return   flower::where('category_id',$id)->first(); 
        
    }
     public function showsalary($id){
      return   flower::where('salary',$id)->first(); 

    }
     public function showsku($id){
      return   flower::where('sku',$id)->first(); 
    }
     public function showname(Request $request){
        if ($request->name)
           {
             $user = flower::where('name',$request->name)->first();  
               
           if($user)
       {
         
          return  $user;
       }
          

    }


}

public function showleng($id){
      return   flower::where('leng',$id)->first(); 
    }
    public function showwidth($id){
      return   flower::where('widt',$id)->first(); 
    }

 public function showbest(){
      return   flower::where('best',1)->first(); 
    }
    public function showstatus(){
      return   flower::where('status',1)->first(); 
    }


















































}
/*
public function newst(Request $request )
    {
     // return   flower::where('name','ورده')->first(); 
           
              // flower::where('name',$id)->first();  
          // return flower::wherename('ورده ')->get();

      
         if ($request->name)
           {
             $user = flower::where('name',$request->name)->first();  
               
           if($user)
       {
         
          return  $user;
       }
          
       }}
       // return flower::where('id', 'designer_id');













}

   /* public function index()
    {
        return Flower::where('status' , 1)->get();
    }
    public function show($id)
    {
        return Flower::with('flowersize','flowerimage')->where('status' , 1)->find($id);
    }
    public function newst(Request $request )
    {
     // return   flower::where('name','ورده')->first(); 
           
              // flower::where('name',$id)->first();  
          // return flower::wherename('ورده ')->get();

      
         if ($request->name)
           {
             $user = flower::where('name',$request->name)->first();  
               
           if($user)
       {
         
          return  $user;
       }
          
       }}
       // return flower::where('id', 'designer_id');

    
    public function best()
    {
        return Flower::where('status' , 1)->where('best' , 1)->paginate(5);
    }
    public function comment(Request $request , $flower_id)
    {
        $flwcomment = new Flowercomment();
        $flwcomment->comment = $request->comment;
        $flwcomment->user_id = Auth::user()->id;
        $flwcomment->flower_id = $flower_id;
        $flwcomment->save();

        $admin = Admin::find(1);
        $admin->notify(new FlowercomNotification($flwcomment));

        return response()->json(['status' => 'success'], 201);
    }
    public function showcomment($flower_id)
    {
        return Flowercomment::with('user')->where('flower_id' , $flower_id)->get();
    }
    public function add(Request $request)
    {
        $flower = new Flower;
        $flower->name = $request->name;
        $flower->body = $request->body;
        $userId = Auth::User()->id;
        $flower->shop_id = Shop::where('user_id' , $userId)->first()->id;
        $flower->subcategory_id = $request->subcategory_id;
        $picture = $request->image;
        $upload_path= base_path() . "/public/pictures/flowers/$request->date.jpg";
        file_put_contents($upload_path,base64_decode($picture));
        $flower->image = "$request->date.jpg";
        $flower->save();  
        
        // images
        $name = $request->date;
        $imageList =  json_decode($request->images, true);
        $i = 0;
        $response = array();
        if (isset($imageList)) {
            if (is_array($imageList)) {
                foreach($imageList as $image) {
                       $decodedImage = base64_decode("$image");
                       $return = file_put_contents(base_path() . "/public/pictures/flower_images/".$name."_".$i.".JPG", $decodedImage);
                    $image = new Flowerimage();
                    $image->flower_id = $flower->id;
                    $image->images = $name. "_" . $i . ".JPG";
                    $image->save();
                    $i++;
                }
            }
        } else{
            $response['success'] = 0;
            $response['message'] = "List is empty.";
        }
     
    /**********/    
        
        //sizes
       /* $json =  json_decode($request->sizes, true);
        foreach ($json as $size) {
           $flowersize = new Flowersize();
           $flowersize->flower_id = $flower->id;
           $flowersize->price = $size['price'];
           $flowersize->size = $size['size'];
           $flowersize->save();
        }
        
        
        return response()->json(['status' => 'success'], 201);
        
    }

}
