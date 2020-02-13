<?php

namespace App\Http\Controllers;

use App\Flower;
use App\Flowerimage;
use App\Flowersize;
use App\Subcategory;
use App\Category;
use App\AdditionCategory;

//use App\Shop;
use App\designer;

use Illuminate\Http\Request;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               $flowerimages = Flowerimage::all();

        $flowers = Flower::all();
        $sizes = Flowersize::all();
      //  $shops = Shop::all();
        return view('admin.flowers.show', compact('flowers' , 'sizes','flowerimages'));
    }

    
    public function create()
    {
        $flower = Flower::all();
      // $shops = Shop::all();
       $categories = category::all();
       $designers = designer::all();
       $additioncategories = AdditionCategory::all();


        return view('admin.flowers.create',compact('flower','categories', 'designers','additioncategories' ));
    }

    
   public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sizes' =>'required',
            ]);
        $flower = new Flower;
        $flower->name = $request->name;
        $flower->category_id = $request->category_id;
        $flower->designer_id = $request->designer_id;
        $flower->salary = $request->salary;
        $flower->leng = $request->leng;
        $flower->widt = $request->widt;
        $flower->tags = $request->tags;
        $flower->type = $request->type;



        

         if($request->sku){
        $flower->sku = $flower->type.$request->sku;
        }else{
        $flower->sku = $flower->type.str_random(6);
            
        }



        $flower->body = $request->body;
     //   $flower->shop_id = $request->shop_id;
       $flower->status = $request->status;
        if($request->best){
        $flower->best = $request->best;
        }else{
            $flower->best == 0;
        }
         if($request->shipping){
            $flower->shipping = $request->shipping;
        }else{
            $flower->shipping == 0;
        }
        if ($request->hasFile('image')) {
            @unlink('pictures/flowers/' . $flower->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/flowers'), $filename);
            $flower->image = $filename;
        }
        $flower->save();

        if ($request->hasFile('images')) {
            foreach ($request->images as $image){
                $flowerimage = new Flowerimage();
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('pictures/flower_images/'), $filename);
                $flowerimage->flower_id = $flower->id;
                $flowerimage->images = $filename;
                $flowerimage->save();
            }
        }
        if (isset($request->sizes)) {
            foreach ($request->sizes as $size) {
                $flowersize = new Flowersize;
                $flowersize->flower_id = $flower->id;
                $flowersize->size = $size;
                $flowersize->price = $flower->salary;

                $flowersize->save();
            }
        }
        return redirect(route('flower.index'))->with('message' , 'تم  الباقة بنجاح');
    }

   
    public function edit($id)
    {
        $flower = Flower::find($id);
        $flowerimage = Flowerimage::find($id);
        $sizes = Flowersize::where('flower_id', $id)->get();
       // $shops = Shop::all();
        $categories = category::all();
        $designers = designer::all();

        return view('admin.flowers.edit',compact('flower' , 'flowerimage'  , 'categories' ,'sizes','categories','designers'));
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
        //  return $request->all();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sizes' =>'required',
            ]);
        $flower = Flower::find($id);
        $flower->name = $request->name;
         $flower->name = $request->name;
        $flower->category_id = $request->category_id;
        $flower->designer_id = $request->designer_id;
        $flower->salary = $request->salary;
         $flower->leng = $request->leng;
        $flower->widt = $request->widt;
        $flower->tags = $request->tags;


       if($request->sku){
        $flower->sku = $request->sku;
        }else{
        $flower->sku = str_random(6);
            
        }

        $flower->body = $request->body;
       // $flower->shop_id = $request->shop_id;
       $flower->status = $request->status;
        $flower->best = $request->best;
        // $flower->shipping = $request->shipping;
        if ($request->hasFile('image')) {
            @unlink('pictures/flowers/' . $flower->image);
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/flowers'), $filename);
            $flower->image = $filename;
        }
        $flower->save();

        if ($request->hasFile('images')) {
            foreach ($request->images as $image){
                $flowerimage = new Flowerimage();
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('pictures/flower_images'), $filename);
                $flowerimage->flower_id = $flower->id;
                $flowerimage->images = $filename;
                $flowerimage->save();
            }
        }
        if (isset($request->sizes)) {
            Flowersize::where('flower_id', $id)->delete();
            foreach ($request->sizes as $size) {
                $flowersize = new Flowersize;
                $flowersize->flower_id = $flower->id;
                $flowersize->size = $size;
                $flowersize->save();
            }
        }
        return redirect(route('flower.index'))->with('message' , 'تم تعديل الباقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flowerimage = Flowerimage::where('flower_id' , $id)->get();
        foreach ($flowerimage as $image){
            @unlink('pictures/flower_images/' . $image->images);
        }

        $flower = Flower::find($id);
        @unlink('pictures/flowers/' . $flower->image);
        $flower->delete();


        return redirect()->back()->with('message' , 'تم حذف الباقة بنجاح');
    }

    public function deletegallery($id)
    {
        $flowerimage = Flowerimage::find($id);
        @unlink('pictures/flower_images/' . $flowerimage->images);
        $flowerimage->delete();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }

    public function delete($id)
    {
        $flower = Flower::find($id);
        $image = $flower->image;
        @unlink('pictures/flowers/' . $image);
        $flower->image = null;
        $flower->save();
        return redirect()->back()->with('message' , 'تم حذف الصورة بنجاح');

    }


}
