@extends('admin.app')
<?php
\Carbon\Carbon::setLocale('ar');
?>

    @section('main-content')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-blue">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{ $user->count() }}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-13">الاعضاء</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{ $flowers->count() }}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block"> الزهور</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <div style="font-size: 50px" class="txt-light data-right-rep-icon">❀</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-green">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{ $additions->count() }}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block">الاضافات</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="fa fa-gift txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{ $usernots + $paynots  }}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block">الاشعارات الجديدة</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                            @if(  $usernots + $paynots > 0)
                                                <i style="color: #fff" class='zmdi zmdi-notifications txt-light data-right-rep-icon faa-ring animated fa-4x'></i>
                                            @else
                                                <i class="zmdi zmdi-notifications txt-light data-right-rep-icon"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-danger card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">اخر الاعضاء</h6>
                        </div>
                        <div class="pull-right">
                            <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_1" aria-expanded="true">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <i class="zmdi zmdi-chevron-up"></i>
                            </a>
                            <a href="#" class="pull-left inline-block full-screen mr-15">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse_1" class="panel-wrapper collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            @foreach($fuser as $user)
                                <div class="col-xs-6">
                                    {{ $user->name }}
                                </div>
                                <div style="text-align: left" class="col-xs-6">
                                    {{ $user->created_at->diffForHumans() }}
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-success card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">اخر باقات الزهور</h6>
                        </div>
                        <div class="pull-right">
                            <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_2" aria-expanded="true">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <i class="zmdi zmdi-chevron-up"></i>
                            </a>
                            <a href="#" class="pull-left inline-block full-screen mr-15">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse_2" class="panel-wrapper collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            @foreach($fflowers as $flower)
                                <div class="col-xs-6">
                                    {{ $flower->name }}
                                </div>
                                <div style="text-align: left" class="col-xs-6">
                                    {{ $flower->created_at->diffForHumans() }}
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-warning card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">اخر الاضافات</h6>
                        </div>
                        <div class="pull-right">
                            <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_3" aria-expanded="true">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <i class="zmdi zmdi-chevron-up"></i>
                            </a>
                            <a href="#" class="pull-left inline-block full-screen mr-15">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse_3" class="panel-wrapper collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            @foreach($fadditions as $addition)
                                <div class="col-xs-6">
                                    {{ $addition->name }}
                                </div>
                                <div style="text-align: left" class="col-xs-6">
                                    {{ $addition->created_at->diffForHumans() }}
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-primary card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">اخر المحلات</h6>
                        </div>
                        <div class="pull-right">
                            <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_4" aria-expanded="true">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <i class="zmdi zmdi-chevron-up"></i>
                            </a>
                            <a href="#" class="pull-left inline-block full-screen mr-15">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse_4" class="panel-wrapper collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endsection
