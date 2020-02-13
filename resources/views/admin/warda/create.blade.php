@extends('admin.app')

@section('main-content')
@include('includes.messages')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">اضافة سلايدر</div>
            <div class="panel-body">
                <form method="post" action="{{ route('warda.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   

                   



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="image">صورة السلايدر</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    
                    
                   
                    <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
                    <a type="button" href="{{ route('warda.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                </form>
        </div>
    </div>
</div>
</div>

@endsection