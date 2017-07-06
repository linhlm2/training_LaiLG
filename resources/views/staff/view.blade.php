@extends('staff.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
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
                                <label>Họ tên</label>
                                <input class="form-control" name="name"  value="{{$staff->name}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday"  value="{{$staff->birthday}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Quê quán</label>
                                <input class="form-control" name="address"  value="{{$staff->address}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Quốc tịch</label>
                                <input class="form-control" name="country" value="{{$staff->country}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                @if($staff->sex == 0 )
                                <div class="form-control" name="sex" 
                                    value ="0"
                                    readonly=""/>Nữ</div>
                                @else
                                <div class="form-control" name="sex" 
                                    value ="1"
                                    readonly=""/>Nam</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone"  value="{{$staff->phone}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$staff->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Phòng</label>
                                <input  class="form-control" name="department"
                                        @if(!empty($staff->department))
                                        value="{{$staff->department->name_department}}"
                                        @else
                                        value ="{{' '}}"
                                        @endif
                                        readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <input  class="form-control" name="position"  
                                        @if(!empty($staff->position))
                                        value="{{$staff->position->name_position}}"
                                        @else
                                        value ="{{' '}}"
                                        @endif 
                                        readonly="" />
                            </div>
                        <button class="btn btn-default"><a href="staff/edit/{{$staff->id}}">Edit</a></button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                @if(!empty($staff->position))
                @if($staff->position->name_position == "Trưởng phòng")
                <div class="col-lg-12">
                        <h1 class="page-header">Cấp dưới
                            <small>Danh sách</small>
                        </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Chức vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listStaff as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{$list->id}}</td>
                                <td><a href="staff/view/{{$list->id}}">{{$list->name}}</a></td>
                                <td>{{$list->birthday}}</td>
                                <td>{{$list->address}}</td>
                                <td>@if($list->sex == 0){{"Nữ"}}
                                    @else {{"Nam"}}
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