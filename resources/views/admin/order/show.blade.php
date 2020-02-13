@extends('admin.app')

@section('head')

@endsection

    @section('main-content')


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>عمليات الشراء</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>الرقم التعريفي</th>
                                            <th>اسم المستخدم</th>
                                            <th>البريد الشخصي</th>
                                            <th>نوع طلب الشراء</th>
                                            <th>رؤية الطلب </th>
                                            <th>الحذف النهائي </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->user->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->user->email }}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <span>دفع عند وصول المنتج</span>
                                                    @else
                                                         <span>تحويل بنكي</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('order.show' , $order->id) }}"><i class="fa fa-eye"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{ $order->id }}" method="post" action="{{ route('order.destroy' , $order->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف هذه العملية؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $order->id }}'  ).submit();}
                                                            else
                                                            {event.preventDefault();};">

                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>الرقم التعريفي</th>
                                            <th>اسم المستخدم</th>
                                            <th>البريد الشخصي</th>
                                            <th>نوع طلب الشراء</th>
                                            <th>رؤية الطلب</th>
                                            <th>الحذف النهائي </th>
                                        </tr>
                                    </thead>
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
            <!-- /.row -->


      @endsection