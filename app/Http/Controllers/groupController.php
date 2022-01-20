<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class groupController extends Controller
{
    public function viewGroup(){
        $groupList =  Group::latest()->get();


        return view('backend.group.view', ['groupList'=> $groupList]);
     }//end Method


     public function storeGroup(Request $request){



       $request->validate([
           'group_name'=>'required |min:3|unique:groups,group_name',
        ]);


        Group::insert([
            'group_name'=>$request->group_name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Group added successfully'
        ];

        return back()->with($notification );



    }//ENd method


    public function editGroup($id){
        $groupInfo =  Group::find($id);

         return view('backend.group.edit', ['groupInfo'=>$groupInfo]) ;
     }//End Method


     public function updateGroup(Request $request){

        $request->validate([
            'group_name'=>'required |min:3|unique:groups,group_name',
        ]);

        Group::where('id', $request->id)->update([
            'group_name'=> $request->group_name,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Group updated successfully'
        ];

        return redirect()->route('view.group')->with($notification);



    }//End Method


    public function deleteGroup($id){
        Group::destroy($id);
        return back();
    }

}
