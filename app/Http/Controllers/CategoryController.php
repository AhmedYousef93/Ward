<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $category = new Category;
        $category->name = $request->name;
        $category->subtitle = $request->subtitle;
       $category->status = $request->status;
        $category->best = $request->best;


        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/categories'), $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect(route('category.index'))->with('message' , 'تم اضافة التصنيف بنجاح');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $request->status? : $request['status']=0;
        $category = Category::find($id);
        $category->name = $request->name;
         $category->status = $request->status;
        $category->best = $request->best;
       
        $category->subtitle = $request->subtitle;
        if ($request->hasFile('image')) {
            @unlink('pictures/categories/' . $category->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/categories'), $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect()->back()->with('message' , 'تم تعديل بيانات التصنيف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        @unlink('pictures/categories/' . $category->image);
        $category->delete();
        return redirect()->back()->with('message' , 'تم حذف التصنيف بنجاح');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        @unlink('pictures/categories/' . $category->image);
        $category->image = null;
        $category->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }


}
