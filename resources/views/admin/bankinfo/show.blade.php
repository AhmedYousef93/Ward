@extends('admin.app')

@section('head')

@endsection

    @section('main-content')
       

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>الحسابات البنكية</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>الرقم التسلسلي</th>
                                            <th>اسم البنك</th>
                                            <th>اسم مالك الحساب</th>
                                            <th>رقم ال(epay)</th>
                                            <th>رقم الحساب</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bankinfos as $bankinfo)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $bankinfo->bank_name }}</td>
                                                <td>{{ $bankinfo->acc_owner }}</td>
                                                <td>{{ $bankinfo->epay_number }}</td>
                                                <td>{{ $bankinfo->acc_number }}</td>
                                                <td><a href="{{ route('bank_accounts.edit' , $bankinfo->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$bankinfo->id}}" method="post" action="{{ route('bank_accounts.destroy' , $bankinfo->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('Do you want delete this'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $bankinfo->id }}'  ).submit();}
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
                                            <th>الرقم التسلسلي</th>
                                            <th>اسم البنك</th>
                                            <th>اسم مالك الحساب</th>
                                            <th>رقم ال(epay)</th>
                                            <th>رقم الحساب</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
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