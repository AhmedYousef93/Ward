@extends('admin.app')
@section('head')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Ta8JulP0ho6s47xUl_Srbyd4unoRoSM&libraries=places&sensor=false"></script>
@endsection
@section('main-content')
    @include('includes.messages')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات محل الورد "{{ $shop->name }}"</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('shop.update', $shop->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="text-align: center;">
                                        <h4>معلومات المالك</h4>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>اسم المالك</th>
                                                        <th>اسم المستخدم للمالك</th>
                                                        <th>البريد الشخصي للمستخدم</th>
                                                        <th>رقم الهاتف</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="gradeU">
                                                        <td>{{ $shop->user->id }}</td>
                                                        <td>{{ $shop->user->name }}</td>
                                                        <td>{{ $shop->user->first_name }} {{ $shop->user->last_name }}</td>
                                                        <td>{{ $shop->user->email }}</td>
                                                        <td>{{ $shop->user->phone }}</td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>اسم المالك</th>
                                                        <th>اسم المستخدم للمالك</th>
                                                        <th>البريد الشخصي للمستخدم</th>
                                                        <th>رقم الهاتف</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $shop->name }}" required placeholder="اسم المحل">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="country_id">المدينة</label>
                            </div>
                            <div class="col-md-10">
                                <select name="country_id" id="country_id" class="form-control select">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($shop->country_id == $country->id)
                                                selected
                                            @endif
                                        >{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="body">نبذة</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="body" name="body">{{ $shop->body }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="image">صورة تعريفية</label>
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
                                        @if(isset($shop->image))
                                            <li style="margin:0 5px;display: inline-block;position: relative">
                                                <div class="small-images">
                                                    <img style="width: 100%;border-radius: 10px" src="{{ asset('pictures/shops/' . $shop->image) }}" alt="{{ $shop->name }}">
                                                    <div class="middle">
                                                        <a class="close-icon" href="{{ route('shopdeleteimage' , $shop->id) }}"><i class="fa fa-times-circle fa-2x"></i></a>
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="all_week">مواعيدالعمل على مدار الاسبوع</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="all_week" name="all_week" value="{{ $shop->all_week }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="friday">مواعيدالعمل يوم الجمعة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="friday" name="friday" value="{{ $shop->friday }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="address">عنوان المحل</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control" id="address" name="address">{{ $shop->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!--<div class="panel panel-default">-->
                        <!--    <div class="panel-heading">-->
                        <!--        <h3 class="panel-title">الموقع على الخريطة</h3>-->
                        <!--    </div>-->
                        <!--    <div class="panel-body">-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-12">-->
                        <!--                <div id="map-canvas"></div>-->
                        <!--                <input id="pac-input"  type="text" placeholder="ابحث عن المحل...">-->
                        <!--                <input type="hidden" id="lat" name="lat" value="{{ $shop->lat }}" required>-->
                        <!--                <input type="hidden" id="lng" name="lng" value="{{ $shop->lng }}" required>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-3">
                            <label for="status">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   فعال  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير فعال  </i>
                                </div>
                            </label>
                            <div class="checkbox">

                                <label style="font-size: 16px;">
                                    <input name="status"
                                           @if ($shop->status == 1)
                                           checked
                                           @endif
                                           value="1" type="checkbox">المحل فعال
                                </label>
                            </div>
                        </div>
                       <div class="col-lg-9">
                            <label for="best">
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   مفضل  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير مفضل  </i>
                                </div>
                            </label>
                            <div class="checkbox">
                                <label style="font-size: 16px;">
                                    <input name="best"
                                           @if ($shop->best == 1)
                                           checked
                                           @endif
                                           value="1" type="checkbox">محل مفضلة
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                        <button type="submit" class="btn btn-primary" style="font-size: 17px;">تحديث</button>
                        <a type="button" href="{{ route('shop.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: {{ $shop->lat }},
                lng: {{ $shop->lng }},
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {
                lat: {{ $shop->lat }},
                lng: {{ $shop->lng }}
            },
            draggable: true
        });
        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
@endsection