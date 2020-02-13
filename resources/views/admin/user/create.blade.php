@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة عضو جديد</div>
                <div class="panel-body">
    <form role="form" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
         <div style="margin-top: 20px" class="form-group ">
            <label for="name">الاسم  </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم ">
        </div>
        <div style="margin-top: 20px" class="form-group ">
            <label for="first_name">الاسم الاول </label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="الاسم الاول">
        </div>
        <div style="margin-top: 20px" class="form-group ">
            <label for="last_name">الاسم الثاني</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder=" الاسم الثاني">
        </div>


        <div class="form-group">
            <label for="email">البريد الالكتروني </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="البريد الالكتروني " value="{{ old('email') }}">
        </div>


        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label for="Password">الرقم السري</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="الرقم السري">
        </div>

        <div class="form-group">
            <label for="password_confirmation">اعادة الرقم السري</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="اعادة الرقم السري">
        </div>

        <label style="margin-left: 10px" for="image">الصوره الشخصية</label><br>
        <input style="margin-top: 10px" type="file" id="image" name="image" >
        <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
        <a type="button" href="{{ route('user.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>

    </form>
                </div>
            </div>
        </div>
    </div>
@endsection