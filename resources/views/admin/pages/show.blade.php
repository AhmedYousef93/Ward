@extends('admin.app')

@section('head')

@endsection

    @section('main-content')
       

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>صفحات الموقع</h4>
                            @include('includes.messages')
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الصفحة</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                            <tr class="gradeU">
                                                <td>{{ $page->id }}</td>
                                                <td> صفحة <h5 style="display: inline-block;color:darkblue">(( {{ $page->title }} ))</h5></td>
                                                <td><a href="{{ route('pages.edit' , $page->id) }}"><i class="fa fa-edit"></i></a></td>
                                                <td>
                                                    <form id="delete-form-{{$page->id}}" method="post" action="{{ route('pages.destroy' , $page->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف الصفحة؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $page->id }}'  ).submit();}
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
                                            <th>الصفحة</th>
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

      @endsection