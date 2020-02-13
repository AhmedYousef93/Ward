@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة باقة ورد</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('flower.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">الاسم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="اسم الورد">
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="category_id">التصنيف</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_id" id="category_id" class="form-control select">
                                   <option >Choose...</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="additioncategory">النوع </label>
                                </div>
                                <div class="col-md-10">
                                    <select name="additioncategory" id="additioncategory" class="form-control select">
                                        <option >Choose...</option>
                                        @foreach ($additioncategories as $additioncategory)
                                   
                                            <option value="{{ $additioncategory->id }}">{{ $additioncategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="designer_id">المصمم </label>
                                </div>
                                <div class="col-md-10">
                                    <select name="designer_id" id="designer_id" class="form-control select">
                                            <option selected>Choose...</option>

                                        @foreach ($designers as $designer)

                                            <option value="{{ $designer->id }}">{{ $designer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="salary">السعر </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" id="salary" name="salary"  placeholder="السعر ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="sku">الرمز </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="type" name="type"  placeholder=" رمز ثابت  ">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="sku">الرمز </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="sku" name="sku"  placeholder="الرمز  ">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="body">نبذة</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="body" name="body" ></textarea>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="leng">الطول  </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" id="leng" name="leng"  placeholder="الطول  ">
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="widt">العرض  </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" id="widt" name="widt" 

                                     placeholder="العرض ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="border-top:1px solid gray;padding-top: 15px">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="size">حجم الباقة</label>
                                    <a title="اضافة مقاس جديد" href="#" class="add_field_button btn btn-primary" style="padding:5px 5px 0px 5px;float: left"><i class="fa fa-plus"></i></a>
                                </div>
                                <div class="col-md-10">
                                    <div class="input_fields_wrap">
                                        <div style="display: inline-block;margin-right: 9px;margin-left: 23px;"><input type="text" name="sizes[]" placeholder="اسم المقاس" class="llll"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tag">اضف تاج </label>
                                </div>
                                <div class="col-md-10">
                                    <input  type="text" id="tag" name="tags" multiple>
                                </div>
                            </div>
                        </div>
                  
                        <br/>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">صورة باقة الورد الرئيسية</label>
                                </div>
                                <div class="col-md-10">
                                    <input  type="file" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">صور باقة الورد الفرعية</label>
                                </div>
                                <div class="col-md-10">
                                    <input  type="file" id="image" name="images[]" multiple>
                                </div>
                            </div>
                        </div>

             <div > 
                        <div class="col-lg-3">
                            <label for="status">
                                <h3>متوفر</h3>
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   متوفر  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير متوفر  </i>
                                </div>
                            </label>
                            <div class="checkbox">
                                <label style="font-size: 16px;">
                                    <input name="status" value="1" type="checkbox">المنتج متوفر
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <label for="best">
                                <h3>الافضل مبيعا</h3>
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   مفضل  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير مفضل  </i>
                                </div>
                            </label>
                            <div class="checkbox">
                                <label style="font-size: 16px;">
                                    <input name="best" value="1" type="checkbox">مفضل
                                </label>
                            </div>
                        </div>
                 </div>
                        <div class="clearfix"></div>
                        <hr/>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة</button>
                        <a type="button" href="{{ route('flower.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection