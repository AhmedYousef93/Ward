<?php

namespace App\Http\Controllers\api;

use App\Addition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionController extends Controller
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
        return Addition::all();
    }
    public function show($id)
    {
        return Addition::find($id);

    }
}
