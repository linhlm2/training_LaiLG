@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.department')}}
                            <small>{{$department->name_department}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/department/edit/{{$department->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            @if(count($errors) > 0)
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
                            <div class="form-group">
                                <label>{{trans('localization.department')}}</label>
                                <input class="form-control" name="name" placeholder="Enter name department" value="{{$department->name_department}}" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.address')}}</label>
                                <input class="form-control" name="address" placeholder="Enter address" value="{{$department->address}}" />
                            </div>
                            <div class="form-group">
                                <label>{{trans('localization.phone')}}</label>
                                <input class="form-control" name="phone" placeholder="Enter phone" value="{{$department->phone}}" />
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
