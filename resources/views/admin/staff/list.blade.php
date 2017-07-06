@extends('admin.layout.index')
    
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
                            <small>Danh sách</small>
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
                                <th style="width: 3%">
                                    <input type="checkbox" id="check-all" class="flat" onClick="toggle(this)">
                                </th>
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
                                <td class="a-center"><input type="checkbox" class="flat resetPassword" name="table_records" value="{{$st->id}}"></td>
                                <td>{{$st->id}}</td>
                                <td>{{$st->name}}</td>
                                <td>{{$st->email}}</td>
                                <td>
                                @if($st->is_admin == 1)
                                {{"Admin"}}
                                @else
                                {{'User'}}
                                @endif
                                </td>
                                <td>
                                @if(!empty($st->department))
                                    {{$st->department->name_department}}
                                @else
                                    {{''}}
                                @endif
                                </td>
                                <td>
                                    @if(!empty($st->position))
                                    {{$st->position->name_position}}
                                @else
                                    {{''}}
                                @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/staff/delete/{{$st->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/staff/edit/{{$st->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
                <button class="btn btn-info resetOk" id="reset_password" type="submit" >Reset password</button>
            
</div>
@endsection
@section('script')
 <script>
     function toggle(source) {
        checkboxes = document.getElementsByName('table_records');
        for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
  }
}
     function getValueChecked() {
	var selected = new Array();
	$(document).ready(function() {
	  $("input:checkbox[name=table_records]:checked").each(function() {
	       selected.push($(this).val());
	  });
	});
  
}

$( "#reset_password" ).click(function() {
    
	var selected = new Array();
	$(document).ready(function() {
	  $("input:checkbox[name=table_records]:checked").each(function() {
	       selected.push($(this).val());
	  });
	});
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
               type:'POST',
               url: './resetmulti',
               //dataType: 'json',
               data: {selected: selected},
               success:function(rs){
                    alert(rs);
                }
            });
        
});
 </script>
 @endsection  