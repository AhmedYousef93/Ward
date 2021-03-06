@extends('admin.app')

@section('head')

@endsection

    @section('main-content')
       

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>جميع التصنيفات</h4>
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
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td><a href="{{ route('category.edit' , $category->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$category->id}}" method="post" action="{{ route('category.destroy' , $category->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف التصنيف؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $category->id }}'  ).submit();}
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