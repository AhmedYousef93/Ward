@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات سلايدر ""</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('warda.update', $warda->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                       

                       
                       

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

                        


                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('warda.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection