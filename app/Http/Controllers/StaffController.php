<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Staff;
use App\Department;
use App\Position;
use Illuminate\Mail\Mailable;
use Mail;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /*
     * Admin get all staff
     */
    public function getList()
    {
        $staff = Staff::all();
    	return view('admin.staff.list',['staff' => $staff]);
    }
    
    /*
     * Admin get staff with id for edit
     */
    public function getEdit($id)
    {   
        $staff = Staff::find($id);
        $department = Department::all();
        $position = Position::all();
        return view('admin.staff.edit',['staff'=>$staff,'department'=>$department,'position'=>$position]);
    }
    
    /*
     * Admin edit staff with id
     */
    public function postEdit(Request $request,$id)
    {
    	$this->validate($request,
                [
                    'name'=>'required|min:3'
                    
                ],
                [
                    'name.required'=>'Please enter name',
                    'name.min'=>'Name length is greater than 3'
                ]);
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->id_department = $request->department;
        $staff->id_position = $request->position;
        $staff->is_admin = $request->authority;
        $staff->active = $request->active;
        if($request->changePassword=='on'){
            $this->validate($request,
                    [
                        'password'=>'required|min:3|max:32',
                        'passwordAgain'=>'required|same:password'
                    ],
                    [
                        'password.required'=>' Please enter password',
                        'password.min'=>'Password length is greater than 3 and less than 32',
                        'password.max'=>'Password length is greater than 3 and less than 32',
                        'passwordAgain.required'=>'Please enter password',
                        'password.same'=>'Password entered incorrectly'
                    ]);
            $staff->password = bcrypt($request->password);
        }
        $staff ->update();
        return redirect('admin/staff/edit/'.$id)->with('notification','Edit completed');
    }
    
    /*
     * Admin get view for add staff
     */
    public function getAdd()
    {
        $department = Department::all();
        $position = Position::all();
    	return view('admin.staff.add',['department'=>$department,'position'=>$position]);
    }
    
    /*
     * Admin add staff  
     */
    public function postAdd(Request $request)
    {
        
        $this->validate($request,
                [
                    'name'=>'required|min:3',
                    'email'=>'required|email|unique:staff,email',
                    'password'=>'required|min:3|max:32'
                ],
                [
                    'name.required'=>'Please enter name',
                    'name.min'=>'Name length is greater than 3',
                    'email.required'=>'Please input email',
                    'email.email'=>'Enter the correct Email format',
                    'email.unique'=>'Email is identical',
                    'password.required'=>'Please input password',
                    'password.min'=>'Password length is greater than 3 and less than 32',
                    'password.max'=>'Password length is greater than 3 and less than 32'
                ]);
        $staff = new Staff;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);
        $staff->id_department = $request->department;
        $staff->id_position = $request->position;
        $staff->is_admin = $request->authority;
        $staff->active = $request->active;
        //send mail
        $data = ['email'=>$request->email,'password'=>$request->password,'name'=>$request->name];
        Mail::send(['text'=>'mail'],['data'=> $data],function($message) use ($data){
            $message->to($data['email'],$data['name'])->subject('Create account');
            $message->from('lailg.hedspi@gmail.com','Admin'); 
        });
        $staff->save();
        return redirect('admin/staff/add')->with('notification','You have successfully added the user');
    }
    
    /*
     * Admin get staff by id for deletion
     */
    public function getDelete($id)
    {
    	$staff = Staff::find($id);
        $staff->delete();
        return redirect('admin/staff/list')->with('notification','Delete completed');
    }
    
    /*
     * User : Get information for view
     */
    public function getView($id)
    {
        $staff = Staff::find($id);
        if(!empty($staff->id_position)) {
            $position = Position::find($staff->id_position);
            if($position->name_position == "Trưởng phòng"){
                $listStaff = Staff::where('id_department',$staff->id_department)->where('id_position','!=',$staff->id_position)->get();
                return view('staff.view',['staff'=>$staff,'listStaff'=>$listStaff]);
            }
        }
        return view('staff.view',['staff'=>$staff]);
    }
    
    /*
     * User get information for edit
     */
    public function getStaffEdit($id)
    {
        if(Auth::id() == $id){
            $staff= Staff::find($id);
            return view('staff.edit',['staff'=>$staff]);
        }
        else{
            Auth::logout();
            return redirect('staff/login');
        }
    }
    
    /*
     * User edit information
     */
    public function postStaffEdit(Request $request,$id)
    {
        $this->validate($request,
                [
                    'name'=>'required|max:30'
                ],
                [
                    'name.required'=>'Please enter name',
                    'name.max'=>'Length name is less than 30'
                ]);
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->birthday = $request->birthday;
        $staff->address = $request->address;
        $staff->sex = $request->sex;
        $staff->country = $request->country;
        $staff->phone = $request->phone;
        if($request->changePassword == "on")
        {
            $this->validate($request,
                    [
                        'password'=>'required|min:3|max:32',
                        'passwordAgain'=>'required|same:password'
                    ],
                    [
                        'password.required'=>' Please enter password',
                        'password.min'=>'Password length is greater than 3 and less than 32',
                        'password.max'=>'Password length is greater than 3 and less than 32',
                        'passwordAgain.required'=>'Please enter password',
                        'password.same'=>'Password entered incorrectly'
                    ]);
            $staff->password = bcrypt($request->password);
        }
        $staff ->update();
        return redirect('staff/edit/'.$id)->with('notification','Edit completed');
    } 
}
