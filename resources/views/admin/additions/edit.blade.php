@extends('admin.app')
@section('head')
@endsection
@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات  "{{ $addition->name }}" </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('addition.update', $addition->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">الاسم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $addition->name }}" required placeholder="اسم">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="body">نبذة</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="body" name="body" required>{{ $addition->body }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="price" name="price" required>{{ $addition->price }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="additioncategory_id">التصنيف</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="additioncategory_id" id="additioncategory_id" class="form-control select">
                                        @foreach ($additioncategories as $additioncategory)
                                            <option value="{{ $additioncategory->id }}"
                                                    @if ($additioncategory->id == $addition->additioncategory_id)
                                                    selected
                                                    @endif
                                            >{{ $additioncategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">الصورة</label>
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
                                        @if($addition->image == null)
                                            لا يوجد صورة
                                        @else
                                        <div class="small-images">
                                        <img style="width: 100%;border-radius: 10px" src="{{ asset('pictures/additions/' . $addition->image) }}" alt="{{ $addition->name }}">
                                        <div class="middle">
                                            <a class="close-icon" href="{{ route('additiondeleteimage' , $addition->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                                        </div>
                                        </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="status">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   متوفر  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير متوفر  </i>
                                </div>
                            </label>
                            <div class="checkbox">

                                <label style="font-size: 16px;">
                                    <input name="status"
                                           @if ($addition->status == 1)
                                           checked
                                           @endif
                                           value="1" type="checkbox">الاضافة متوفرة
                                </label>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('addition.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@section('foot')
@endsection
@endsection

