@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات التصنيف "{{ $additioncategory->name }}"</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('additioncategory.update', $additioncategory->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $additioncategory->name }}" required placeholder="اسم التصنيف">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="subtitle">العنوان الفرعي </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"  placeholder="العنوان الفرعي" value="{{ $additioncategory->subtitle }}">
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

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <div class="image-preview" style="margin-bottom: 50px;">
                                        @if(isset($additioncategory->image))
                                            <li style="margin:0 5px;display: inline-block;position: relative">
                                                <div class="small-images">
                                                    <img style="width: 100%;border-radius: 10px" src="{{ asset('pictures/categories/' . $additioncategory->image) }}" alt="{{ $additioncategory->name }}">
                                                    <div class="middle">
                                                        <a class="close-icon" href="{{ route('additiondeleteimage' , $category->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            لا يوجد صورة
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('additioncategory.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection