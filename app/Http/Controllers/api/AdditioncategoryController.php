<?php

namespace App\Http\Controllers\api;

use App\AdditionCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditioncategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdditionCategory::with('additions')->get();
    }
    public function show($id)
    {
        return AdditionCategory::with('additions')->find($id);
    }
}
