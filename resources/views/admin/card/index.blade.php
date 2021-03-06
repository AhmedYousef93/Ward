@extends('admin.app')

@section('head')

@endsection

@section('main-content')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

            <div class="panel-heading" style="text-align: center;">
                <h4>بطاقات التهنئة</h4>
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
                            <th> الاسم</th>
                            <th>الصورة </th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cards as $card)
                            <tr class="gradeU">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $card->name }}</td>
                                <td style="text-align: center"><img style="height: 50px;width: 50px" src="{{ asset('pictures/cards/' .  $card->image ) }}"></td>
                                <td><a href="{{ route('card.edit' , $card->id) }}"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form id="delete-form-{{$card->id}}" method="post" action="{{ route('card.destroy' , $card->id) }}" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('هل تريد حذف البطاقة؟؟'))
                                            {event.preventDefault();document.getElementById('delete-form-{{ $card->id }}'  ).submit();}
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
                            <th>الصورة </th>
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