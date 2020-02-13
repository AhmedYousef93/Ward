<?php

namespace App\Http\Controllers;

use App\Addition;
use App\AdditionCategory;
use Illuminate\Http\Request;

class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additions = Addition::all();
        $additioncategories = AdditionCategory::all();
        return view('admin.additions.show', compact('additions' , 'additioncategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $additions = Addition::all();
        $additioncategories = AdditionCategory::all();
        return view('admin.additions.create' , compact('additions' ,  'additioncategories'));
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
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $addition = new Addition();
        $addition->name = $request->name;
        $addition->body = $request->body;
        $addition->price = $request->price;
        $addition->status = $request->status;
        $addition->additioncategory_id = $request->additioncategory_id;
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/additions'), $filename);
            $addition->image = $filename;
        }
        $addition->save();


        return redirect(route('addition.index'))->with('message' , 'تم الاضافة بنجاح');
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
        $addition = Addition::find($id);
        $additioncategories = AdditionCategory::all();
        return view('admin.additions.edit',compact('addition' , 'additioncategories' ));
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
            'name' => 'required|string|max:255',
        ]);
        $addition = Addition::find($id);
        $addition->name = $request->name;
        $addition->body = $request->body;
        $addition->price = $request->price;
        $addition->status = $request->status;
        $addition->additioncategory_id = $request->additioncategory_id;
        if ($request->hasFile('image')) {
            @unlink('pictures/additions/' . $addition->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/additions'), $filename);
            $addition->image = $filename;
        }
        $addition->save();

        return redirect(route('addition.index'))->with('message' , 'تم تعديل الباقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addition = Addition::find($id);
        @unlink('pictures/additions/' . $addition->image);
        $addition->delete();
        return redirect()->back()->with('message' , 'تم الحذف بنجاح');
    }

    public function delete($id)
    {
        $addition = Addition::find($id);
        $image = $addition->image;
        @unlink('pictures/additions/' . $image);
        $addition->image = null;
        $addition->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
