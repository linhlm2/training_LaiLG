<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    public function getList()
    {
        $staff = Staff::all();
        //dd($nhanvien);
    	return view('admin.staff.list',['staff' => $staff]);

    }
    public function getEdit()
    {

    }
    public function postEdit()
    {
    	
    }
    public function getAdd()
    {
    	
    }
    public function postAdd()
    {
    	
    }
    public function postDelete()
    {
    	
    }
}
