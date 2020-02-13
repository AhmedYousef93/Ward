<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.show', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->status = $request->status;
        $banner->link = $request->link;
        if ($request->hasFile('image')) {
            @unlink('pictures/banners/' . $banner->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/banners'), $filename);
            $banner->image = $filename;
        }
        $banner->save();
        return redirect()->back()->with('message' , 'تم الاضافة بنجاح');
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
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
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
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->status = $request->status;
        $banner->link = $request->link;
        if ($request->hasFile('image')) {
            @unlink('pictures/banners/' . $banner->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/banners'), $filename);
            $banner->image = $filename;
        }
        $banner->save();
        return redirect()->back()->with('message' , 'تم تعديل بيانات البانر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        @unlink('pictures/banners/' . $banner->image);
        $banner->delete();
        return redirect()->back()->with('message' , 'تم حذف البانر بنجاح');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        @unlink('pictures/banners/' . $banner->image);
        $banner->image = null;
        $banner->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
