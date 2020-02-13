@extends('admin.app')

@section('head')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

            <div class="panel-heading" style="text-align: center;">
                <h4>   تعليق المستخدم " {{ $flowercomment->user->name }} "
                    <br>
                    علي "   {{ $flowercomment->flower->name }} "
                </h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="col-md-12">
                        <ul style="list-style: none">
                            <li class="pay-li">
                                {{ $flowercomment->comment }}
                            </li>
                        </ul>
                    </div>
                </div>                <!-- /.table-responsive -->
            </div>            <!-- /.panel-body -->
             </div>        <!-- /.panel -->
             <a type="button" href="{{ route('flowercomment.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
        </div>    <!-- /.col-lg-12 -->
    </div>   <!-- /.row -->
@endsection
@section('foot')
@endsection

