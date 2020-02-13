@extends('admin.app')
@section('head')
@endsection
    @section('main-content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="text-align: center;">
                            <h4>جميع المحلات</h4>
                            @include('includes.messages')
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الاسم</th>
                                            <th>مفضل</th>
                                            <th>مواعيد العمل</th>
                                            <th>اسم المالك</th>
                                            <th>الاطلاع و التعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shops as $shop)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $shop->name }}</td>
                                                <td style="text-align: center">
                                                    @if($shop->best == 0)
                                                        <i style="color: red" class="fa fa-times"></i>
                                                    @else
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>من السبت الى الخميس</span>  <span style="float: left">{{ $shop->all_week }}</span>
                                                    <br>
                                                    <span>الجمعة</span>  <span style="float: left">{{ $shop->friday }}</span>
                                                </td>
                                                <td>{{ $shop->user->name }}</td>
                                                <td><a href="{{ route('shop.edit' , $shop->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$shop->id}}" method="post" action="{{ route('shop.destroy' , $shop->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف المحل؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $shop->id }}'  ).submit();}
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
                                            <th>ID</th>
                                            <th>الاسم</th>
                                            <th>مفضل</th>
                                            <th>مواعيد العمل</th>
                                            <th>اسم المالك</th>
                                            <th>الاطلاع و التعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
    @endsection
@section('foot')
@endsection
