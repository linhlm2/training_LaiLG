<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;

class MultilanguageController extends Controller
{
    public function getLang(Request $request)
    {
        if(!session()->has('locale')){
            session(['locale'=> $request->locale]);
        }else{
            session(['locale'=>$request->locale]);
        }
        return Redirect::back();
    }
}
