<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Arr;


class ResetPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /*
     * Send list email reset passsword
     */
    public function sendMail(Request $request)
    {   
        $listId = $request->get('selected');
        foreach ($listId as $list)
        {
            $staff = Staff::find($list);
            $this->_sendResetToMail($staff->email);
        }
        return "Send mail reset password completed";   
       
    }
    
    private function _sendResetToMail($mail) {
        $mailArr = [];
        Arr::set($mailArr, 'email', $mail);
        $this->broker()->sendResetLink($mailArr);
    } 
}
