@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة هدية جديدة</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('addition.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">الاسم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="اسم">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="body">نبذة</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="body" name="body" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="price" name="price" required></textarea>
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
                                            <option value="{{ $additioncategory->id }}">{{ $additioncategory->name}}</option>
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
                        <div class="col-lg-12">
                            <label for="status">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   متوفر  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير متوفر  </i>
                                </div>
                            </label>
                            <div class="checkbox">

                                <label style="font-size: 16px;">
                                    <input name="status" value="1" type="checkbox">الاضافة متوفرة
                                </label>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة</button>
                        <a type="button" href="{{ route('addition.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection