@extends('admin.app')

@section('head')

@endsection

@section('main-content')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

            <div class="panel-heading" style="text-align: center;">
                <h4>معلومات التحويل</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="@if($pays->status==1) col-md-6 @else col-md-12 @endif">
                        <ul style="list-style: none">
                            <h2 style="color: #0d70b7">المعلومات الشخصية</h2>
                            <li class="pay-li"><span class="pay-small">اسم العضوية : </span> <a href="{{ route('user.edit', $order->pay->user->id) }}">{{ $order->pay->user->name ?? '--' }}</a> </li>
                            <li class="pay-li"><span class="pay-small">الاسم الشخصي: </span> {{ $order->pay->user_name ?? '--' }} </li>
                            <li class="pay-li"><span class="pay-small">البريد الشخصي: </span> {{ $order->pay->user->email ?? '--' }} </li>
                            @if($order->pay->status == 1)
                                <li class="pay-li"><span class="pay-small">نوع التحويل: </span> تحويل بنكي </li>
                            @else
                                <li class="pay-li"><span class="pay-small">نوع التحويل: </span> دقع عند الاستلام </li>
                            @endif
                            @if($order->pay->status == 1)
                                <li class="pay-li"><span class="pay-small">اسم البنك: </span> {{ $order->pay->bank->bank_name ?? '--' }} </li>
                            @endif
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading" style="text-align: center;">
                                            <h4>المنتجات</h4>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                    <tr>
                                                        <th>اسم الباقة</th>
                                                        <th> الكمية</th>
                                                         <th> المحلات</th>
                                                        <th>الحجم</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pays->orders as $order)
                                                        <tr>
                                                            <td>{{ $order->flower->name ?? '--' }}</td>
                                                            <td>( {{ $order->qty }} )</td>
                                                            <td><a href="{{ route('shop.edit', $order->flower->shop->id) }}">{{ $order->flower->shop->name }}</a></td>
                                                            <td>{{ $order->flowersize->size }}</td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                   
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->

                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->

                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <li class="pay-li"><span class="pay-small">الاضافات: </span>
                                @if (count($additions) > 0)
                                    @foreach($additions as $addition)
                                        <a href="{{ route('addition.edit', $addition->addition->id) }}">{{ $addition->addition->name ?? '--' }}</a> -
                                    @endforeach
                                @else
                                    لا توجد اضافات
                                @endif
                                
                            </li>
                            @if(count($order->card_id) > 0)
                                <li class="pay-li"><span class="pay-small">البطاقة: </span> <a href="{{ route('card.edit', $order->card->id) }}">{{ $order->card->name }}</a> </li>
                            @else
                                <li class="pay-li"><span class="pay-small">البطاقة: </span> لم يتم تحديد بطاقة </li>
                            @endif
                            @if(count($order->card_id) > 0)
                                <li class="pay-li"><span class="pay-small">نص البطاقة: </span> {{ $order->card_text ?? 'غير محدد' }} </li>
                            @endif
                            
                            <h2 style="color: #0d70b7; margin-top: 40px;" >معلومات التوصيل</h2>
                        <li class="pay-li"><span class="pay-small">المدينة : </span> {{ $order->pay->addresss->country->name ?? 'غير محدد' }} </li>
                        <li class="pay-li"><span class="pay-small">العنوان : </span> {{ $order->pay->addresss->address ?? 'غير محدد' }} </li>
                        <li class="pay-li"><span class="pay-small">الشارع : </span> {{ $order->pay->addresss->street ?? 'غير محدد' }} </li>
                        <li class="pay-li"><span class="pay-small">رقم المنزل : </span> {{ $order->pay->addresss->home_num ?? 'غير محدد' }} </li>
                        <li class="pay-li"><span class="pay-small">مكان مميز : </span> {{ $order->pay->addresss->guide_place ?? 'غير محدد' }} </li>
                        </ul>
                        
                        
                    </div>
                    @if(count($order->pay->image )>0)
                        <div class="col-md-6">
                            <h6 style="text-align: center">صورة التحويل</h6>
                            <img id="myImg" src="{{ asset('pictures/pays/' . $order->pay->image ) }}" alt="{{ $order->pay->id }}" style="width:100%;">
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span style="color:whitesmoke;" class="close btn btn-danger"><i class="fa fa-times"></i></span>
                                <img class="modal-content" id="img01">
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <a type="button" href="{{ route('pay.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@section('foot')
    <script src="{{asset('admin/js/jquery/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });

        var modal = document.getElementById('myModal');

        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");;
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endsection

@endsection
