<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flower;

class flower extends Controller
{
    //
    public function index(){
    	return flower::orderBy('id','desc')->paginate(5);
    }
    public function show($id){
    	return flower::find($id);
    }
    // id  is  anumber here belong to designer and categogry in own database 
     public function showdesigner($id){
    	return flower::where('id', $flower->designer_id);
    }
     public function showcategory($id){
    	return flower::where('id',$flower->category_id);
    }
     public function showsalary($id){
    	return flower::where('id',$flower->salary);
    }
     public function showsku($id){
    	return flower::where('id',$flower->sku);
    }
}
