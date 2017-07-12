@extends('staff.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.staff')}}
                            <small>{{$staff->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) >0 )
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                    @endif  
                        <form action="staff/edit/{{$staff->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>{{trans('localization.name')}}</label>
                                <input class="form-control" name="name"  value="{{$staff->name}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.birthday')}}</label>
                                <input type="date" class="form-control" name="birthday"  value="{{$staff->birthday}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.address')}}</label>
                                <input class="form-control" name="address"  value="{{$staff->address}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.country')}}</label>
                                <input class="form-control" name="country" value="{{$staff->country}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.sex')}}</label>
                                @if($staff->sex == 0 )
                                <div class="form-control" name="sex" 
                                    value ="0"
                                    readonly=""/>{{trans('localization.female')}}</div>
                                @else
                                <div class="form-control" name="sex" 
                                    value ="1"
                                    readonly=""/>{{trans('localization.male')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.phone')}}</label>
                                <input class="form-control" name="phone"  value="{{$staff->phone}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$staff->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.department')}}</label>
                                <input  class="form-control" name="department"
                                        @if(!empty($staff->department))
                                        value="{{$staff->department->name_department}}"
                                        @else
                                        value ="{{' '}}"
                                        @endif
                                        readonly="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.position')}}</label>
                                <input  class="form-control" name="position"  
                                        @if(!empty($staff->position))
                                        value="{{$staff->position->name_position}}"
                                        @else
                                        value ="{{' '}}"
                                        @endif 
                                        readonly="" />
                            </div>
                        <a class="btn btn-default" href="staff/edit/{{$staff->id}}">Edit</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                @if(!empty($staff->position))
                @if($staff->position->name_position == "Trưởng phòng")
                <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.lowergrade')}}
                            <small>{{trans('localization.list')}}</small>
                        </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>{{trans('localization.name')}}</th>
                                <th>{{trans('localization.birthday')}}</th>
                                <th>{{trans('localization.address')}}</th>
                                <th>{{trans('localization.sex')}}</th>
                                <th>{{trans('localization.phone')}}</th>
                                <th>Email</th>
                                <th>{{trans('localization.position')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listStaff as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{$list->id}}</td>
                                <td><a href="staff/view/{{$list->id}}">{{$list->name}}</a></td>
                                <td>{{$list->birthday}}</td>
                                <td>{{$list->address}}</td>
                                <td>@if($list->sex == 0){{trans('localization.female')}}
                                    @else {{trans('localization.male')}}
                                    @endif
                                </td>
                                <td>{{$list->phone}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->position->name_position}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @endif
            </div>
            <!-- /.container-fluid -->
        </div>
 @endsection

 @section('script')
 <script>
     $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
            else
            {   
                    $(".password").attr('disabled','');
            }    
        });
     });
 </script>
 @endsection 