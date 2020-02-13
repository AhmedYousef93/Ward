@extends('admin.app')
@section('head')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Ta8JulP0ho6s47xUl_Srbyd4unoRoSM&libraries=places&sensor=false"></script>
@endsection
@section('main-content')
@include('includes.messages')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">اضافة محل جديد</div>
            <div class="panel-body">
                <form method="post" action="{{ route('shop.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="user_id">مالك المحل</label>
                            </div>
                            <div class="col-md-10">
                                <select name="user_id" id="user_id" class="form-control select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">الاسم</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name"  required placeholder="اسم المحل">
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
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                <textarea type="text" class="form-control" id="body" name="body"></textarea>
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
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="all_week">مواعيدالعمل على مدار الاسبوع</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="all_week" name="all_week">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="friday">مواعيدالعمل يوم الجمعة</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="friday" name="friday">
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
                                <textarea type="text" class="form-control" id="address" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">الموقع على الخريطة</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map-canvas"></div>
                                    <input id="pac-input"  type="text" placeholder="ابحث عن المحل...">
                                    <input type="hidden" id="lat" name="lat" value="24.774265" required>
                                    <input type="hidden" id="lng" name="lng" value="46.738586" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for="status">
                            <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   فعال  </i> --
                                <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير فعال  </i>
                            </div>
                        </label>
                        <div class="checkbox">

                            <label style="font-size: 16px;">
                                <input name="status" value="1" type="checkbox">المحل فعال
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                            <label for="best">
                                <h3>محل مفضل</h3>
                                <div style="border: 1px solid gray;border-radius: 5px;display: inline-block;">
                                    <i style="color: green;font-size:18px;" class="fa fa-check-square-o" aria-hidden="true">   مفضل  </i> --
                                    <i style="color: green;font-size:18px;" class="fa fa-square-o fa-xl" aria-hidden="true"> غير مفضل  </i>
                                </div>
                            </label>
                            <div class="checkbox">
                                <label style="font-size: 16px;">
                                    <input name="best" value="1" type="checkbox">مفضل
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                    <button type="submit" class="btn btn-primary" style="font-size: 17px;">اضافة </button>
                    <a type="button" href="{{ route('shop.index') }}" class="btn btn-warning" style="font-size: 17px;float: left">الرجوع</a>
                </form>
        </div>
    </div>
</div>
</div>

@endsection
@section('foot')
    <script>
        function init() {
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {
                    lat: 24.774265,
                    lng: 46.738586
                },
                zoom: 12
            });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);

                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var marker = new google.maps.Marker({
                            position: place.geometry.location,
                            draggable: true
                        });
                        google.maps.event.addListener(marker, 'position_changed', function(){
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();
                            $('#lat').val(lat);
                            $('#lng').val(lng);
                        });
                        marker.bindTo('map', searchBox, 'map');
                        google.maps.event.addListener(marker, 'map_changed', function() {
                            if (!this.getMap()) {
                                this.unbindAll();
                            }
                        });
                        bounds.extend(place.geometry.location);
                    }(place));
                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),12));
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endsection