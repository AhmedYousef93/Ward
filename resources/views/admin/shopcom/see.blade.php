@extends('admin.app')

@section('head')
    <link href="{{ asset('admin/star-rating.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading" style="text-align: center;">
                <h4>   تعليق المستخدم " {{ $shopcomment->user->name }} "
                    <br>
                    علي "   {{ $shopcomment->shop->name }} "
                </h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="col-md-12">
                        <ul style="list-style: none">
                            <li class="pay-li">
                                {{ $shopcomment->comment }}
                            </li>
                        </ul>
                    </div>
                </div>                <!-- /.table-responsive -->
                <div style="float: left;">
                    <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $shopcomment->shop->averageRating }}" data-size="xs" disabled="">
                </div>
            </div>            <!-- /.panel-body -->
             </div>        <!-- /.panel -->
             <a type="button" href="{{ route('shopcomment.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
        </div>    <!-- /.col-lg-12 -->
    </div>   <!-- /.row -->
@endsection
@section('foot')
    <script src="{{asset('admin/star-rating.min.js')}}"></script>
    <script type="text/javascript">
        $("#input-id").rating();
    </script>
@endsection

