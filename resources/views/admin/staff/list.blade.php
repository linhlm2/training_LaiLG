@extends('admin.layout.index')
    
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Phòng ban</th>
                                <th>Chức vụ</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($staff as $st)
                            <tr class="odd gradeX" align="center">
                                <td>{{$st->id_nv}}</td>
                                <td>{{$st->hoten}}</td>
                                <td>{{$st->email}}</td>
                                <td>
                                @if($st->is_admin == 1)
                                {{"Admin"}}
                                @else
                                {{'User'}}
                                @endif
                                </td>
                                <td>{{$st->department->ten_phongban}}</td>
                                <td>{{$st->position->ten_chucvu}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
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