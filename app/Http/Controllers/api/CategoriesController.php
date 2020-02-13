<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show','sections' , 'occasions' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $x =  Category::with('subcategories')->get();
       return $x;
    }  

   
    public function show($id)
    {
        return Category::find($id);
    }
    
     public function sections()
    {
       return Category::with('subcategories')->where('id' , 1)->get();
       
    }
    
    public function Occasions()
    {
       return Category::with('subcategories')->where('id' , 2)->get();
       
    }
}
