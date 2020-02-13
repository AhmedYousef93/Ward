@extends('admin.app')

@section('main-content')
@include('includes.messages')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">اضافة تصنيف جديد</div>
            <div class="panel-body">
                <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">الاسم</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name"  required placeholder="اسم التصنيف">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="subtitle">العنوان الفرعي </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="subtitle" name="subtitle"  required placeholder="العنوان الفرعي">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="image">صورة التصنيف</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" id="image" name="image">
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
                    <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
                    <a type="button" href="{{ route('category.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                </form>
        </div>
    </div>
</div>
</div>

@endsection