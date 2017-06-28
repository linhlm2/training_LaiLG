 @extends('admin.layout.index')
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
                        <form action="admin/staff/edit/{{$staff->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="Enter  name" value="{{$staff->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$staff->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password"  class="form-control password" name="password" placeholder="Enter password"
                                disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Enter password" 
                                disabled="" />
                            </div>
                         <div class="form-group">
                                <label>Phòng</label>
                                
                                <select class="form-control" name="department" id="">
                                @foreach($department as $depart)
                                    <option 
                                    @if($staff->department->id == $depart->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$depart->id}}">{{$depart->name_department}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control" name="position" id="">
                                @foreach($position as $pos)
                                    <option 
                                    @if($staff->position->id == $pos->id)
                                    {{"selected"}}
                                 @endif
                                    value="{{$pos->id}}">{{$pos->name_position}}</option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phân quyền</label>
                                <label class="radio-inline">
                                    <input name="authority" value="0" 
                                    @if($staff->is_admin == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="authority" value="1" 
                                    @if($staff->is_admin == 1)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Admin
                                </label>
                            </div>
                            <div class="form-group">
                                <label>kích hoạt</label>
                                <label class="radio-inline">
                                    <input name="active" value="0" 
                                    @if($staff->active == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Không kích hoạt
                                </label>
                                <label class="radio-inline">
                                    <input name="active" value="1" 
                                    @if($staff->active == 1)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Kích hoạt
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
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