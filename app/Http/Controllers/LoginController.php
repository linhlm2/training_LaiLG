<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
     * Admin get view for login
     */
    public function getLoginAdmin()
    {
        return view('admin.login');
    }
    
    /*
     * Admin request login
     */
    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
                [
                    'email'=>'required',
                    'password'=>'required|min:3|max:32'
                ],
                [
                    'email.required'=>'Please enter email',
                    'password.required'=>'Please enter password',
                    'password.min'=>'Password length is greater than 3 and less than 32',
                    'password.max'=>'Password length is greater than 3 and less than 32',
                ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=>1])) {
            return redirect('admin/staff/list');            
        }elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=> 0])) {
            return redirect('changepassword/'.Auth::id());
        }else {
            return redirect('admin/login')->with('notification','Login failed');
        }
    }
    
    /*
     * Admin logout
     */
    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    
    /*
     * Get user by id for change password
     */
    public function getChangePassword($id)
    {
        $user = Staff::find($id);
        return view('changepassword');
    }
    
    /*
     * Change password by user id
     */
    public function postChangePassword(Request $request,$id)
    {
        $user = Staff::find($id);
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
        $user->password = bcrypt($request->password);
        $user->active = 1;
        $user->update();
        if($user->is_admin == 1)
        {
            return redirect('admin/staff/list')->with('notification','Change password completed');
        }
        else
        {
            return redirect('staff/view/'.$user->id)->with('notification','Change password completed');
        }
    }
    
    /*
     * user get view login
     */
    public function getLoginStaff()
    {
        return view('staff.login');
    }
    
    /*
     * User login
     */
    public function postLoginStaff(Request $request)
    {
        $this->validate($request,
                [
                    'email'=>'required',
                    'password'=>'required|min:3|max:32'
                ],
                [
                    'email.required'=>'Please enter email',
                    'password.required'=>'Please enter password',
                    'password.min'=>'Password length is greater than 3 and less than 32',
                    'password.max'=>'Password length is greater than 3 and less than 32',
                ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=>1])) {
            return redirect('staff/view/'.Auth::id());            
        }
        elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=> 0])) {
            return redirect('changepassword/'.Auth::id());
        }
        else {
            return redirect('staff/login')->with('notification','Login failed');
        }
    }
    
    /*
     * User logout
     */
    public function getLogoutStaff()
    {
        Auth::logout();
        return redirect('staff/login');
    }
}
