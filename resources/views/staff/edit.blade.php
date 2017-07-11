@extends('staff.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.staff')}}
                            <small><a href="staff/view/{{$staff->id}}">{{$staff->name}}</a></small>
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
                                <input class="form-control" name="name"  value="{{$staff->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.birthday')}}</label>
                                <input type="date" class="form-control" name="birthday"  value="{{$staff->birthday}}"/>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.address')}}</label>
                                <input class="form-control" name="address"  value="{{$staff->address}}" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.country')}}</label>
                                <input class="form-control" name="country"  value="{{$staff->country}}"/>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.sex')}}</label>
                                <label class="radio-inline">
                                    <input name="sex" value="0" 
                                    @if($staff->sex == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">{{trans('localization.female')}}
                                </label>
                                <label class="radio-inline">
                                    <input name="sex" value="1" 
                                    @if($staff->sex == 1)
                                    {{"checked"}}
                                    @endif
                                    type="radio">{{trans('localization.male')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.phone')}}</label>
                                <input class="form-control" name="phone"  value="{{$staff->phone}}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>{{trans('localization.changepass')}}</label>
                                <input type="password"  class="form-control password" name="password" placeholder="Nhập mật khẩu"
                                disabled="" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.checkpass')}}</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" 
                                disabled="" />
                            </div>
                        <button class="btn btn-default">Edit</button>
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