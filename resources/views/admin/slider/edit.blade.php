@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات سلايدر "{{ $slider->title }}"</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
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

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <div class="image-preview" style="margin-bottom: 50px;">
                                        @if(isset($slider->image))
                                            <li style="margin:0 5px;display: inline-block;position: relative">
                                                <div class="small-images">
                                                    <img style="width: 100%;border-radius: 10px" src="{{ asset('pictures/sliders/' . $slider->image) }}" alt="{{ $slider->name_ar }}">
                                                    <div class="middle">
                                                        <a class="close-icon" href="{{ route('sliderdeleteimage' , $slider->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            لا يوجد صورة
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('slider.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection