@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل   " {{ $card->name }}"</div>
                <div class="panel-body">
    <form role="form" action="{{route('card.update' , $card->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <label style="margin-bottom:10px;margin-left: 10px" for="image">الصوره</label><br>
            <li style="margin:0 5px;list-style:none;position: relative">
                <div style="height: 100px;width: 100px">
                    <img style="border-radius: 50%;height: 100%;width: 100%" src="{{ asset('pictures/cards/' .  $card->image ) }}">
                </div>
            </li>
        <input style="margin-top: 10px;" type="file" id="image" name="image" >

        <div style="margin-top: 20px" class="form-group ">
            <label for="name">الاسم </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" value="{{ $card->name }}">
        </div>
        <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
        <a type="button" href="{{ route('card.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
    </form>
                </div>
            </div>
        </div>
    </div>
@endsection