@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة بطاقة تهنئة جديدة</div>
                <div class="panel-body">
    <form role="form" action="{{route('card.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div style="margin-top: 20px" class="form-group ">
            <label for="name">الاسم </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
        </div>

        <label style="margin-left: 10px" for="image">الصوره </label><br>
        <input style="margin-top: 10px" type="file" id="image" name="image" >
        <br>
        <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
        <a type="button" href="{{ route('card.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>

    </form>
                </div>
            </div>
        </div>
    </div>
@endsection