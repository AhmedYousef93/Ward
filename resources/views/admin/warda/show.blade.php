@extends('admin.app')

@section('head')

@endsection

    @section('main-content')


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading" style="text-align: center;">
                            <h4>ورد عالي الجوده </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        
                                            <tr>
                                            <th>ID</th>
                                            <th>العنوان</th>
                                            <th>حذف</th>
                                            <th>تعديل</th>

                                        </tr>
                                     
                                    </thead>
                                    <tbody>
                                        @foreach ($wardas as $warda)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td> 

                                                    <img   alt="..." style="width: 100px" src="{{asset('pictures/slider/'.$warda->image)}}" /></td>


                                              
                                                


                                                <td>
                                                	<form id="delete-form-{{$warda->id}}" method="post" action="{{ route('warda.destroy' , $warda->id) }}" style="display: none;">
                                                		@csrf
                                                		{{ method_field('DELETE') }}
                                                	</form>
                                                	<a href="" onclick="
                                                        if(confirm('هل تريد حذف العنوان؟؟'))
                                                            {event.preventDefault();document.getElementById('delete-form-{{ $warda->id }}'  ).submit();}
                                                        else
                                                            {event.preventDefault();};">

                                                            <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td><a href="{{ route('warda.edit' , $warda->id) }}"><i class="fa fa-edit"></i></a>
                                                   </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>ID</th>
                                            <th>العنوان</th>
                                            <th>حذف</th>
                                            <th>تعديل</th>
                                            
                                        </tr>
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