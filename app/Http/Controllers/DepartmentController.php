<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function getList()
    {
        $department = Department::all();
        return view('admin.department.list',['department'=>$department]);
    }
    
    public function getEdit($id)
    {   
        $department = Department::find($id);
        return view('admin.department.edit',['department'=>$department]);
    }
    
    public function postEdit(Request $request,$id)
    {
    	$this->validate($request,
                [
                    'name'=>'required|max:50|unique:department,name_department,'.$id,
                    'address'=>'required|max:80',
                    'phone'=>'required|numeric|digits_between:9,11'
                ],
                  [
                    'name.required'=>'Please enter name department',
                    'name.max'=>'Name length is less than 50',
                    'name.unique'=>'Duplicate name department ',
                    'address.required'=>'Please enter address',
                    'address.max'=>'Address length is less than 50',
                    'phone.required'=>'Please enter phone',
                    'phone.numeric'=>'Enter type number',
                    'phone.digits_between'=>'Phone length is between 9-11'
                  ]);
        $department = Department::find($id);
        $department->name_department = $request->name;
        $department->address = $request->address;
        $department->phone = $request->phone;
        $department->update();
        return redirect('admin/department/edit/'.$id)->with('notification','Edit completed');
    }
    
    public function getAdd()
    {
        return view('admin.department.add');
    }
    
    public function postAdd(Request $request)
    {
        $this->validate($request,
                [
                    'name'=>'required|unique:department,name_department|max:50',
                    'address'=>'required|max:80',
                    'phone'=>'required|numeric|digits_between:9,11'
                ],
                [
                    'name.required'=>'Please enter name department',
                    'name.max'=>'Name length is less than 50',
                    'name.unique'=>'Duplicate name department ',
                    'address.required'=>'Please enter address',
                    'address.max'=>'Address length is less than 50',
                    'phone.required'=>'Please enter phone',
                    'phone.numeric'=>'Enter type number',
                    'phone.digits_between'=>'Phone length is between 9-11'
                ]);
        $department = new Department;
        $department->name_department = $request->name;
        $department->address = $request->address;
        $department->phone = $request->phone;
        $department->save();
        return redirect('admin/department/list')->with('notification','Add completed');
    }
    
    public function getDelete($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('admin/department/list')->with('notification','Delete completed');
    }
}
