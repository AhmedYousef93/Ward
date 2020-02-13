<?php

namespace App\Http\Controllers;

use App\Procomment;
use App\Flower;
use Illuminate\Http\Request;

class ProcommentController extends Controller
{
    public function index()
    {
        $comments = Procomment::all();
        return view('admin.procomment.show' , compact('comments'));
    }

    public function show($id)
    {
        $comments = Procomment::find($id);
        return view('admin.procomment.see' , compact('comments'));
    }

    public function destroy($id)
    {
        Procomment::where('id' , $id)->delete();
        return redirect()->back();
    }

}
