@extends('admin.app')

@section('main-content')
@include('includes.messages')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">اضافة مدينة جديدة</div>
            <div class="panel-body">
                <form method="post" action="{{ route('country.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">الاسم</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name"  required placeholder="اسم المدينة">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
                    <a type="button" href="{{ route('country.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                </form>
        </div>
    </div>
</div>
</div>

@endsection
