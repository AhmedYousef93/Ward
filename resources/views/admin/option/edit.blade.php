@extends('admin.app')


@section('main-content')

    @include('includes.messages')

    <form role="form" action="{{route('option.update' , 1)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="name">اسم الموقع</label>
            <input style="margin-bottom: 20px;" rows="10" class="form-control" id="name" name="name" placeholder="الاسم" value="{{ $option->name }}">
        </div>

        <div class="form-group">
            <label for="title_en">رقم الهاتف - Phone Number</label>
            <input style="margin-bottom: 20px;direction: ltr" rows="10" class="form-control" id="phone" name="phone" placeholder="الهاتف - phone"  value="{{ $option->phone}}">
        </div>

        <div class="form-group">
            <label for="email">البريد الالكتروني - Email</label>
            <input style="margin-bottom: 20px;" rows="10" class="form-control" id="email" name="email" placeholder="البريد - email" value="{{ $option->email }}">
        </div>

        <div class="form-group">
            <label for="location">الموقع</label>
            <input style="margin-bottom: 20px;" rows="10" class="form-control" id="location" name="location" placeholder="الموقع" value="{{ $option->location }}">
        </div>

        <div class="form-group">
            <label for="footer"> <i class="fa fa-arrow-down"></i> النص السفلي  </label>
            <input type="text" class="form-control" id="footer" name="footer" placeholder="النص السفلي للموقع" value="{{ $option->footer }}">
        </div>


        <div class="form-group">
            <label for="header"> <i class="fa fa-arrow-up"></i> النص العلوي  </label>
            <input type="text" class="form-control" id="header" name="header" placeholder="النص العلوي للموقع" value="{{ $option->header }}">
        </div>

        <div class="form-group">
            <label for="andriod"> رابط التطبيق "Andriod" </label>
            <input type="text" class="form-control" id="andriod" name="andriod" placeholder="رابط التطبيق 'Andriod'" value="{{ $option->andriod }}">
        </div>

        <div class="form-group">
            <label for="ios"> رابط التطبيق "Ios" </label>
            <input type="text" class="form-control" id="ios" name="ios" placeholder="رابط التطبيق 'Ios'" value="{{ $option->ios }}">
        </div>

        <hr style="border-bottom: 2px solid black">
        <button type="submit" class="btn btn-primary pull-left" style="font-size: 17px;">تعديل</button>
        <a type="button" href="{{ route('option.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>

    </form>
@endsection