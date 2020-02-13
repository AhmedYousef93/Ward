@extends('admin.app')

@section('main-content')
@include('includes.messages')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">اضافه مصمم جديد </div>
            <div class="panel-body">
                <form method="post" action="{{ route('designer.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">الاسم</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name"  required placeholder="اسم المصمم ">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="category_id">التصنيف الأب</label>
                            </div>
                            <div class="col-md-10">
                                <select name="category_id" id="category_id" class="form-control select">
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
                                <label for="image">صوره المصمم </label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" id="image" name="image" required>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
                    <a type="button" href="{{ route('designer.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                </form>
        </div>
    </div>
</div>
</div>

@endsection