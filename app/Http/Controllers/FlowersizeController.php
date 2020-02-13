<?php

namespace App\Http\Controllers;

use App\Flowersize;
use Illuminate\Http\Request;

class FlowersizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowersizes = Flowersize::all();
        return view('admin.flowersize.show', compact('flowersizes' ));
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
        $flowersize = Flowersize::find($id);
        return view('admin.flowersize.edit',compact('flowersize' ));
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
            'price' => 'required',
        ]);
        $flowersize = Flowersize::find($id);
        $flowersize->price = $request->price;
        $flowersize->save();

        return redirect(route('flowersize.index'))->with('message' , 'تم تعديل الباقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flowersize::find($id)->delete();
        return redirect()->back()->with('message' , 'تم الحذف بنجاح');
    }
}
