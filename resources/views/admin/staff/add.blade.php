 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.staff')}}
                            <small>{{trans('localization.add')}}</small>
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
                        <form action="admin/staff/add" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>{{trans('localization.name')}}</label>
                                <input class="form-control" name="name" placeholder="Enter name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.password')}}</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.department')}}</label>
                                <select class="form-control" name="department" id="">
                                @foreach($department as $depart)
                                    <option value="{{$depart->id}}">{{$depart->name_department}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.position')}}</label>
                                <select class="form-control" name="position" id="">
                                @foreach($position as $pos)
                                    <option value="{{$pos->id}}">{{$pos->name_position}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.authority')}}</label>
                                <label class="radio-inline">
                                    <input name="authority" value="0" checked="" type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="authority" value="1" type="radio">Admin
                                </label>
                            </div>
                        <div class="form-group">
                                <label>{{trans('localization.active')}}</label>
                                <label class="radio-inline">
                                    <input name="active" value="0" checked="" type="radio">{{trans('localization.no')}}
                                </label>
                                <label class="radio-inline">
                                    <input name="active" value="1" type="radio">{{trans('localization.yes')}}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
 @endsection       