@extends('admin.app')

@section('head')

@endsection

    @section('main-content')
       

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>جميع المصممين </h4>
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
                                            <th>التصنيف الأب</th>
                                            <th>الصوره</th>

                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($designers as $designer)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $designer->name }}</td>
                                                <td><a href="{{ route('designer.edit', $designer->category->id) }}">{{ $designer->category->name }}</a></td>
                                                
                                               
                                                      <td> 

                                                    <img   alt="..." style="width: 100px" src="{{asset('pictures/subcategories/'.$designer->image)}}" /></td>
                                                    <td><a href="{{ route('designer.edit' , $designer->id) }}"><i class="fa fa-edit"></i></a></td>
                                                    <td> <form id="delete-form-{{$designer->id}}" method="post" action="{{ route('designer.destroy' , $designer->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف التصنيف الفرعي؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $designer->id }}'  ).submit();}
                                                            else
                                                            {event.preventDefault();};">

                                                        <i class="fa fa-trash"></i>
                                                    </a></td>
                                                   
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الاسم</th>
                                            <th>التصنيف الأب</th>
                                            <th>الصوره</th>

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