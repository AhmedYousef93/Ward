@extends('admin.app')

@section('head')
@endsection
    @section('main-content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>اسعار باقات الورد</h4>
                            @include('includes.messages')
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>صورة الباقة</th>
                                            <th>اسم ابلاقة</th>
                                            <th>حجم الباقة</th>
                                            <th>سعر الباقة</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flowersizes as $flowersize)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    @if($flowersize->flower->image == null)
                                                        لا يوجد صورة
                                                    @else
                                                        <img style="width: 100px;height: 100px;border-radius: 10px" src="{{ asset('pictures/flowers/' . $flowersize->flower->image) }}" alt="{{ $flowersize->flower->name }}">
                                                    @endif
                                                </td>
                                                <td>{{ $flowersize->flower->name }}</td>
                                                <td>
                                                    {{ $flowersize->size }}
                                                </td>
                                                <td>
                                                    {{ $flowersize->price }} ريال سعودي
                                                </td>
                                                <td><a href="{{ route('flowersize.edit' , $flowersize->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$flowersize->id}}" method="post" action="{{ route('flowersize.destroy' , $flowersize->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف الحجم؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $flowersize->id }}'  ).submit();}
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
                                            <th>صورة الباقة</th>
                                            <th>اسم ابلاقة</th>
                                            <th>حجم الباقة</th>
                                            <th>سعر الباقة</th>
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
        @section('foot')
        @endsection
    @endsection