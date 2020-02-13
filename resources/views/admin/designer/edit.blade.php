@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات التصنيف الفرعي"{{ $designer->name }}"</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('designer.update', $designer->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $designer->name }}" required placeholder="اسم التصنيف الفرعي ">
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
                                            <option value="{{ $category->id }}"
                                                    @if ($category->id == $designer->category_id)
                                                    selected
                                                    @endif
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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


                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
                        <a type="button" href="{{ route('designer.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection