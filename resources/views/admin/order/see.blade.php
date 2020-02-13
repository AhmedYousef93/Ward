@extends('admin.app')

@section('head')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

            <div class="panel-heading" style="text-align: center;">
                <h4>معلومات عملية الشراء</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="col-md-12">
                        <ul style="list-style: none">
                            <h2 style="color: #0d70b7">المعلومات الشخصية</h2>
                            <li class="pay-li"><span class="pay-small">الاسم الشخصي: </span> {{ $orders->user->name }} </li>
                            <br>
                            <li class="pay-li"><span class="pay-small">البريد الشخصي: </span> {{ $orders->user->email }} </li>
                            <br>
                            <li class="pay-li"><span class="pay-small">نوع عملية الشراء: </span>
                                @if($orders->status == 1)
                                    <p>تحويل بنكي</p>
                                @else
                                    <p>دفع عند التوصيل</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>                <!-- /.table-responsive -->
            </div>            <!-- /.panel-body -->
             </div>        <!-- /.panel -->
             <a type="button" href="{{ route('order.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
        </div>    <!-- /.col-lg-12 -->
    </div>   <!-- /.row -->
@endsection
@section('foot')
@endsection

