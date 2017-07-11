@extends('admin.layout.index')
    
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{trans('localization.department')}}
                            <small>{{trans('localization.list')}}</small><span style="float: right;"><a class="btn btn-info" href="admin/department/add">Add</a></span>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>{{trans('localization.name')}}</th>
                                <th>{{trans('localization.address')}}</th>
                                <th>{{trans('localization.phone')}}</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($department as $depart)
                            <tr class="odd gradeX" align="center">
                                <td>{{$depart->id}}</td>
                                <td>{{$depart->name_department}}</td>
                                <td>{{$depart->address}}</td>
                                <td>{{$depart->phone}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/department/delete/{{$depart->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/department/edit/{{$depart->id}}">Edit</a></td>
                            </tr>
                         @endforeach   
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection

