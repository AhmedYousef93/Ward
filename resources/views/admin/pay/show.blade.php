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
                                            <th> الاسم الشخصي في الموقع --> اسم المستخدم </th>
                                            <th>البريد الشخصي</th>
                                            <th>نوع عملية الشراء</th>
                                            <th>رؤية </th>
                                            <th>الحذف النهائي </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pays as $pay)
                                            <tr>
                                                <td>{{ $pay->user->id }}</td>
                                                <td>{{ $pay->user->name }} => "{{ $pay->user_name }}"</td>
                                                <td>{{ $pay->user->email }}</td>
                                                <td>
                                                    @if($pay->status == 0)
                                                        <span>دفع عند التوصيل</span>
                                                    @else
                                                        <span>تحويل بنكي</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('pay.show' , $pay->id) }}"><i class="fa fa-eye"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{ $pay->id }}" method="post" action="{{ route('pay.destroy' , $pay->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف هذه العملية؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $pay->id }}'  ).submit();}
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
                                            <th> الاسم الشخصي في الموقع --> اسم المستخدم </th>
                                            <th>البريد الشخصي</th>
                                            <th>نوع عملية الشراء</th>
                                            <th>رؤية </th>
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
