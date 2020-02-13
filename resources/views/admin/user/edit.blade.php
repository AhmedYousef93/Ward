@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل معلومات العضو  " {{ $user->name }}"</div>
                <div class="panel-body">
    <form role="form" action="{{route('user.update' , $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <label style="margin-bottom:10px;margin-left: 10px" for="image">الصوره الشخصية</label><br>
        @if(isset($user->image))
            <li style="margin:0 5px;display: inline-block;width:170px;height: 170px;position: relative">
                <div class="small-images" style="height: 100%;width: 100%">
                    <img style="border-radius: 50%;height: 100%;width: 100%" src="{{ asset('pictures/avatars/' .  $user->image ) }}">
                    <div class="middle">
                        <a class="close-icon" href="{{ route('userdeleteimage' , $user->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                    </div>
                </div>
            </li>
        @else
        <img style="width: 150px;height: 100px;border-radius: 50%" src="{{ asset('pictures/avatars/avatar.png' ) }}">
        @endif
        <input style="margin-top: 10px;" type="file" id="image" name="image" >
        <div style="margin-top: 20px" class="form-group ">
            <label for="name">الاسم  </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم " value="{{ $user->name }}">
        </div>
        <div style="margin-top: 20px" class="form-group ">
            <label for="first_name">الاسم الاول </label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="الاسم الاول" value="{{ $user->first_name }}">
        </div>
        <div style="margin-top: 20px" class="form-group ">
            <label for="last_name">الاسم الثاني</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder=" الاسم الثاني" value="{{ $user->last_name }}">
        </div>
        <div class="form-group">
            <label for="email">البريد الالكتروني </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="البريد الالكتروني " value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" value="{{ $user->phone }}">
        </div>
        <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
        <a type="button" href="{{ route('user.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
    </form>
                </div>
            </div>
        </div>
    </div>
@endsection