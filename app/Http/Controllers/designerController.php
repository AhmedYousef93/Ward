<?php

namespace App\Http\Controllers;

use App\Flower;
use App\designer;
use App\Category;
use Illuminate\Http\Request;

class designerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designers = designer::all();
        return view('admin.designer.show', compact('designers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();

        $designers = designer::all();
        return view('admin.designer.create', compact('designers','categories'));
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
            'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
        ]);
        $designer = new designer;
        $designer->name = $request->name;
        $designer->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/subcategories'), $filename);
            $designer->image = $filename;
        }
        $designer->save();
        return redirect(route('designer.index'))->with('message' , 'تمت اضافه المصمم بنجاح ');
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
        $categories = Category::all();
        $designer = designer::find($id);
        return view('admin.designer.edit', compact('categories', 'designer'));
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
            'image' => 'image|mimes:jpeg,bmp,png|max:2000',
        ]);
        $designer = designer::find($id);
        $designer->name = $request->name;
        $designer->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            @unlink('pictures/subcategories/' . $designer->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/subcategories'), $filename);
            $designer->image = $filename;
        }
        $designer->save();
        return redirect(route('designer.index'))->with('message' , 'تم تعديل التصنيف الفرعي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designer = designer::find($id);
        @unlink('pictures/subcategories/' . $designer->image);
        $designer->delete();
        return redirect()->back()->with('message' , 'تم حذف التصنيف الفرعي بنجاح');
    }

    public function delete($id)
    {
        $designer = designer::find($id);
        @unlink('pictures/subcategories/' . $designer->image);
        $designer->image = null;
        $designer->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }

}
