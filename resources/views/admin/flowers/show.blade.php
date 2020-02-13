@extends('admin.app')

@section('head')
@endsection
    @section('main-content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>باقات الورد</h4>
                            @include('includes.messages')
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>الاسم</td>
                                            <td>التصنيف</td>
                                            <td>المصمم</td>
                                            <td>السعر</td>
                                            <td>الرمز</td>
                                            <td>الطول</td>
                                            <td>العرض</td>

                                            <td>الصوره</td>
                                            <td>تعديل</td>
                                            <td>حذف</td>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flowers as $flower)
                                            <tr class="gradeU">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $flower->name }}</td>
                                               
                                                <td>{{ $flower->category->name }}</td>
                                                <td>{{ $flower->designer->name }}</td>
                                                <td>{{ $flower->salary }}</td>
                                                <td>{{ $flower->sku }}</td>
                                                <td>{{ $flower->leng }}</td>
                                                <td>{{ $flower->widt }}</td>


                                                <td> <img   alt="..." style="width: 100px" src="{{asset('pictures/flowers/'.$flower->image)}}" /></td>


                                             
                                                <td><a href="{{ route('flower.edit' , $flower->id) }}"><i class="fa fa-edit"></i></a></td>

                                                <td>
                                                    <form id="delete-form-{{$flower->id}}" method="post" action="{{ route('flower.destroy' , $flower->id) }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick="
                                                            if(confirm('هل تريد حذف الباقة؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $flower->id }}'  ).submit();}
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