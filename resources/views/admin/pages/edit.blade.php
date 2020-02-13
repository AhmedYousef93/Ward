@extends('admin.app')


@section('main-content')

    @include('includes.messages')

    <form role="form" action="{{route('pages.update' , $page->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="title">عنوان الصفحة</label>
            <input style="margin-bottom: 20px;" rows="10" class="form-control" id="title" name="title" placeholder="عنوان الصفحة" value="{{ $page->title }}"></input>
        </div>

        <div class="form-group">
            <label for="body">محتوى الصفحة</label>
            <textarea style="margin-bottom: 20px;" rows="10" class="form-control" id="body" name="body" placeholder="المحتوى" >{{ $page->body  }}</textarea>
        </div>

        <label style="margin-left: 10px" for="image">الصوره التعريفيه</label><br>
        @if(isset($page->image))
                <li style="margin:0 5px;display: inline-block;width:100px;height: 100px;position: relative">
                    <div class="small-images">
                        <img style="width: 100px;height: 100px;border-radius: 50%" src="{{ asset('pictures/pages/' .  $page->image ) }}">
                        <div class="middle">
                            <a class="close-icon" href="{{ route('pagedeleteimage' , $page->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                        </div>
                    </div>
                </li>
        @else
            لا يوجد صورة
        @endif
        <input style="margin-top: 10px" type="file" id="image" name="image" >



            <hr style="border-bottom: 2px solid black">
            <button type="submit" class="btn btn-primary pull-left" style="font-size: 17px;">تعديل</button>
            <a type="button" href="{{ route('pages.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>

    </form>
@endsection