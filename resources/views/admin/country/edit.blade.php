@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات مدينة  "{{ $country->name }}"</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('country.update', $country->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}" required placeholder="اسم المدينة">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('country.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
