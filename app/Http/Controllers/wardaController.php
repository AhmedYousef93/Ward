<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warda;

class wardaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $wardas = warda::all();
        return view('admin.warda.show', compact('wardas'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('admin.warda.create');
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
        $wardas = new warda;
        

        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/slider'), $filename);
            $wardas->image = $filename;
        }

        $wardas->save();
        return redirect(route('warda.index'))->with('message' , 'تم اضافة سلايدر بنجاح');

    
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
         $warda= warda::find($id);
        return view('admin.warda.edit', compact('warda'));
    
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
         $warda= warda::find($id);
        if ($request->hasFile('image')) {
            @unlink('pictures/slider/' . $warda->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/slider'), $filename);
            $warda->image = $filename;
        }
        $warda->save();
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
         $warda = warda::find($id);
        @unlink('pictures/sliders/' . $warda->image);
        $warda->delete();
        return redirect()->back()->with('message' , 'تم حذف سلايدر بنجاح');
    }
     public function delete($id)
    {
        $warda = warda::find($id);
        @unlink('pictures/sliders/' . $warda->image);
        $warda->image = null;
        $warda->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }
}
