@extends('admin.app')

@section('head')

@endsection

@section('main-content')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

            <div class="panel-heading" style="text-align: center;">
                <h4>الاعضاء</h4>
                <div style="margin-top: 10px;">
                    @include('includes.messages')
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>الرقم التعريفي</th>
                            <th> الاسم</th>
                            <th>البريد الالكتروني </th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="gradeU">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ route('user.edit' , $user->id) }}"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form id="delete-form-{{$user->id}}" method="post" action="{{ route('user.destroy' , $user->id) }}" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Do you want delete this'))
                                            {event.preventDefault();document.getElementById('delete-form-{{ $user->id }}'  ).submit();}
                                            else
                                            {event.preventDefault();};">

                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <thead>
                       
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
