<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    /*
     * Admin get all position
     */
    public function getList()
    {
        $position = Position::all();
        return view('admin.position.list',['position'=>$position]);
    }
    
    /*
     * Admin get position by id for edit
     */
    public function getEdit($id)
    {   
        $position = Position::find($id);
        return view('admin.position.edit',['position'=>$position]);
    }
    
    /*
     * Admin edit position by id
     */
    public function postEdit(Request $request,$id)
    {
    	$this->validate($request,
                [
                    'name'=>'required|unique:position,name_position,'.$id
                ],
                [
                    'name.required'=>'Enter the name position',
                    'name.unique'=>'Name is identical'
                ]);
        $position = Position::find($id);
        $position->name_position = $request->name;
        $position->update();
        return redirect('admin/position/list')->with('notification','Edit completed');   
    }
    
    /*
     * Admin get view for add position
     */
    public function getAdd()
    {
        return view('admin.position.add');
    }
    /*
     * Admin add position
     */
    public function postAdd(Request $request)
    {
        $this->validate($request,
                [
                    'name'=>'required|unique:position,name_position'
                ],
                [
                    'name.required'=>'Enter the name position',
                    'name.unique'=>'Name is identical'
                ]);
        $position = new Position;
        $position->name_position = $request->name;
        $position->save();
        return redirect('admin/position/list')->with('notification','Add completed');
    }
    
    /*
     * Admin get positon by id for delection
     */
    public function getDelete($id)
    {
    	$position = Position::find($id);
        $position->delete();
        return redirect('admin/position/list')->with('notification','Delete completed');
    }
}
