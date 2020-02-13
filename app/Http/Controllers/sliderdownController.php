<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliderdown;

class sliderdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $sliders = Sliderdown::all();
        return view('admin.slider.show', compact('sliders'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('admin.slider.create');
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
         $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,bmp,png|max:5000',

        ]);
        $slider = new Sliderdown;
        

        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/slider'), $filename);
            $slider->image = $filename;
        }

        $slider->save();
        return redirect(route('slider.index'))->with('message' , 'تم اضافة سلايدر بنجاح');

    
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
        //
         $slider = Sliderdown::find($id);
        return view('admin.slider.edit', compact('slider'));
    
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
        //
         $slider = Sliderdown::find($id);
        if ($request->hasFile('image')) {
            @unlink('pictures/slider/' . $slider->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/slider'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->back()->with('message' , 'تم تعديل بيانات سلايدر بنجاح');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $slider = Sliderdown::find($id);
        @unlink('pictures/sliders/' . $slider->image);
        $slider->delete();
        return redirect()->back()->with('message' , 'تم حذف سلايدر بنجاح');
    }
     public function delete($id)
    {
        $slider = Sliderdown::find($id);
        @unlink('pictures/sliders/' . $slider->image);
        $slider->image = null;
        $slider->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
