@extends('admin.app')

@section('head')
@endsection
    @section('main-content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>الاضافات</h4>
                            @include('includes.messages')
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الصورة</th>
                                            <th>الاسم</th>
                                            <th>متوفر</th>
                                            <th>تصنيف </th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($additions as $addition)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td style="width: 130px;height: auto;"><img style="width: 100%;height: auto;border-radius: 20%" src="{{ asset('pictures/additions/' . $addition->image) }}"></td>
                                                <td>{{ $addition->name }}</td>
                                                <td style="text-align: center">
                                                    @if($addition->status == 0)
                                                        <i style="color: red" class="fa fa-times"></i>
                                                    @else
                                                        <i style="color:green" class="fa fa-check"></i>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('additioncategory.edit', $addition->additioncategory->id) }}">{{ $addition->additioncategory->name }}</a></td>
                                                <td><a href="{{ route('addition.edit' , $addition->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$addition->id}}" method="post" action="{{ route('addition.destroy' , $addition->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف الاضافة؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $addition->id }}'  ).submit();}
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
                                            <th>الصورة</th>
                                            <th>الاسم</th>
                                            <th>متوفر</th>
                                            <th>تصنيف </th>
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