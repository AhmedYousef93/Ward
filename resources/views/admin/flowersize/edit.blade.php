@extends('admin.app')
@section('head')
@endsection
@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات حجم - الخاص بالباقة {{ $flowersize->flower->name }} "{{ $flowersize->size }}" </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('flowersize.update', $flowersize->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $flowersize->price }}" required placeholder="سعر">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('flower.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@section('foot')
@endsection
@endsection

