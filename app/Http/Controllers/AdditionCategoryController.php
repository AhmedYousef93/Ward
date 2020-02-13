<?php

namespace App\Http\Controllers;

use App\AdditionCategory;
use Illuminate\Http\Request;

class AdditionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additioncategories = AdditionCategory::all();
        return view('admin.additioncategory.show', compact('additioncategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.additioncategory.create');
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
        ]);
        $additioncategory = new AdditionCategory();
        $additioncategory->name = $request->name;
        $additioncategory->subtitle = $request->subtitle;
       $additioncategory->status = $request->status;
        $additioncategory->best = $request->best;


        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/categories'), $filename);
            $additioncategory->image = $filename;
        }
   
        $additioncategory->save();
        return redirect(route('additioncategory.index'))->with('message' , 'تم اضافة التصنيف بنجاح');
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
        $additioncategory = AdditionCategory::find($id);
        return view('admin.additioncategory.edit', compact('additioncategory'));
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
        $additioncategory = AdditionCategory::find($id);
        $additioncategory->name = $request->name;
        $additioncategory->subtitle = $request->subtitle;
       $additioncategory->status = $request->status;
        $additioncategory->best = $request->best;


        if ($request->hasFile('image')) {
            @unlink('pictures/categories/' . $additioncategory->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/categories'), $filename);
            $additioncategory->image = $filename;
   
        $additioncategory->save();
        return redirect()->back()->with('message' , 'تم تعديل بيانات التصنيف بنجاح');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdditionCategory::find($id)->delete();
                @unlink('pictures/categories/' . $additioncategory->image);

        return redirect()->back()->with('message' , 'تم حذف التصنيف بنجاح');
    }
     public function delete($id)
    {
        $AdditionCategory = AdditionCategory::find($id);
        @unlink('pictures/categories/' . $AdditionCategory->image);
        $AdditionCategory->image = null;
        $AdditionCategory->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
