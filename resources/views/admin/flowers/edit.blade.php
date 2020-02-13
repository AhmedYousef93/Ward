@extends('admin.app')
@section('head')
@endsection
@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات الباقة "{{ $flower->name }}" </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('flower.update', $flower->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">الاسم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $flower->name }}" required placeholder="اسم الباقة">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="body">نبذة</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="body" name="body" required>{{ $flower->body }}</textarea>
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
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if ($category->id == $flower->category_id)
                                                    selected
                                                    @endif
                                            >{{ $category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                             <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="designer_id">التصنيف</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="designer_id" id="designer_id" class="form-control select">
                                        @foreach ($designers as $designer)
                                            <option value="{{ $designer->id }}"
                                                    @if ($designer->id == $flower->designer_id)
                                                    selected
                                                    @endif
                                            >{{ $designer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="border-top:1px solid gray;padding-top: 15px">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="size">الحجم</label>
                                    <a title="اضافة مقاس جديد" href="#" class="add_field_button btn btn-primary" style="padding:5px 5px 0px 5px;float: left"><i class="fa fa-plus"></i></a>
                                </div>
                                <div class="col-md-10">
                                    <div class="input_fields_wrap">
                                        @foreach ($sizes as $size)
                                            <div style="display: inline-block;margin-right: 10px">
                                                <input type="text" value="{{ $size->size }}" name="sizes[]" placeholder="اسم المقاس" class="llll">
                                                <a style="border-radius: 50%;padding: 2px 5px 0px 5px;" href="#" class="remove_field btn btn-danger"> <i class="fa fa-times"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">صورة باقة الورد الرئيسية</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="image" type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <div class="image-preview" style="margin-bottom: 50px;">
                                        @if($flower->image == null)
                                            لا يوجد صورة
                                        @else
                                        <div class="small-images">
                                        <img style="width: 100%;border-radius: 10px" src="{{ asset('pictures/flowers/' . $flower->image) }}" alt="{{ $flower->name }}">
                                        <div class="middle">
                                            <a class="close-icon" href="{{ route('deleteimage' , $flower->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                                        </div>
                                        </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">صور باقة الورد</label>
                                </div>
                                <div class="col-md-10">
                                    <input  type="file" id="image" name="images[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="image-preview" style="margin-bottom: 50px;">
                                        <ul style="list-style: none;margin-right: 45px">
                                            @if(count($flower->flowerimage) > 0)
                                                @foreach($flower->flowerimage as $pflowerimage)
                                                    <li style="margin:0 5px;display: inline-block;width:100px;height: 100px;position: relative">
                                                        <div class="small-images">
                                                            <img style="width: 100px;height: 100px" src="{{ asset('pictures/flower_images/' . $pflowerimage->images) }}" alt="{{ $flower->name }}" class="image" style="width:100%">
                                                            <div class="middle">
                                                                <a class="close-icon" href="{{ route('deleteimages' , $pflowerimage->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                لا يوجد صور
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="status">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   متوفر  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير متوفر  </i>
                                </div>
                            </label>
                            <div class="checkbox">

                                <label style="font-size: 16px;">
                                    <input name="status"
                                           @if ($flower->status == 1)
                                           checked
                                           @endif
                                           value="1" type="checkbox">الباقة متوفرة
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <label for="best">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   مفضلة  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير مفضلة  </i>
                                </div>
                            </label>
                            <div class="checkbox">

                                <label style="font-size: 16px;">
                                    <input name="best"
                                           @if ($flower->best == 1)
                                           checked
                                           @endif
                                           value="1" type="checkbox">الباقة مفضلة
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('flower.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@section('foot')
@endsection
@endsection

