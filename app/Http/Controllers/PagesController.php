<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('admin.pages.show', compact('pages') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = Pages::all();
        return view('admin.pages.pages' , compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'body' => 'required',
        ]);
        $page = new Pages;
        if ($request->hasFile('image')){
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/pages'), $filename);
            $page->image = $filename;
        }
        $page->title = $request->title;
        $page->body = $request->body;
        $page->save();
        return redirect(route('pages.index'));
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
        $page = Pages::where('id' , $id)->first();
        return view('admin.pages.edit' , compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $this->validate($request , [
            'title' => 'required',
            'body' => 'required',
        ]);
        $page = Pages::find($id);
        if ($request->hasFile('image')){
            @unlink('pictures/pages/' . $page->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/pages'), $filename);
            $page->image = $filename;
        }
        $page->title = $request->title;
        $page->body = $request->body;
        $page->save();
        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        @unlink('pictures/pages/' . $page->image);
        $page->delete();

        return redirect()->back()->with('message' , 'تم حذف الصفحة بنجاح');
    }

    public function delete($id)
    {
        $page = Pages::find($id);
        @unlink('pictures/pages/' . $page->image);
        $page->image = null;
        $page->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
