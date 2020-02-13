@extends('admin.app')

@section('head')

@endsection

    @section('main-content')


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>التعليقات على الزهور</h4>
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
                                            <th>رؤية التعليق </th>
                                            <th>الحذف النهائي </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flowercomments as $flowercomment)
                                            <tr>
                                                <td>{{ $flowercomment->user->id }}</td>
                                                <td>{{ $flowercomment->user->name }}</td>
                                                <td>{{ $flowercomment->user->email }}</td>
                                                <td><a href="{{ route('flowercomment.show' , $flowercomment->id) }}"><i class="fa fa-eye"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{ $flowercomment->id }}" method="post" action="{{ route('flowercomment.destroy' , $flowercomment->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف هذا التعليق؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $flowercomment->id }}'  ).submit();}
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
                                            <th>رؤية التعليق</th>
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
