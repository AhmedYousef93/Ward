@extends('admin.app')

@section('main-content')
@include('includes.messages')
<form role="form" action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">عنوان الصفحة</label>
        <input style="margin-bottom: 20px;" rows="10" class="form-control" id="title" name="title" placeholder="عنوان الصفحة" >
    </div>

    <div class="form-group">
        <label for="body">محتوى الصفحة</label>
        <textarea style="margin-bottom: 20px;" rows="10" class="form-control" id="body" name="body" placeholder="المحتوى" ></textarea>
    </div>

    <label style="margin-left: 10px" for="image">الصوره التعريفيه</label><br>
    <input style="margin-top: 10px" type="file" id="image" name="image" >



    <hr style="border-bottom: 2px solid black">
    <button type="submit" class="btn btn-primary pull-left" style="font-size: 17px;">اضافة</button>
    <a type="button" href="{{ route('pages.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>

</form>
@endsection