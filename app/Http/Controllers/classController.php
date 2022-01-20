<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllClass;

class classController extends Controller
{
    public function viewClass(){
       $classList =  AllClass::latest()->get();

       return view('backend.allClass.view', ['classList'=>   $classList]);
    }//end Method


    public function storeClass(Request $request){

        $request->validate([
            'class_name'=>'required |min:3|unique:all_classes,class_name',
        ]);


        $result = AllClass::insert([
            'class_name'=>$request->class_name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Class added successfully'
        ];

        return back()->with($notification );



    }//ENd method

    public function editClass($id){
       $classInfo =  AllClass::find($id);

        return view('backend.allClass.edit', ['classInfo'=>$classInfo]) ;
    }//End Method


    public function updateClass(Request $request){

        $request->validate([
            'class_name'=>'required',
        ]);

        AllClass::where('id', $request->id)->update([
            'class_name'=> $request->class_name,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Class updated successfully'
        ];

        return redirect()->route('view.class')->with($notification);



    }//End Method

    public function deleteClass($id){
        AllClass::where('id', $id)->delete();
        return back();
    }



}
