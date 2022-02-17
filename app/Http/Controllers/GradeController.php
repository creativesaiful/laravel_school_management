<?php

namespace App\Http\Controllers;

use App\Models\GradeSystem;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function GradeView(){
       $data['grade'] =  GradeSystem::all();

       return view('backend.marks.grade_view', $data);
    }//End gradeview method

    public function GradeAdd(){
        return view('backend.marks.grade_add');
    }//End Method


    public function GradeStore(Request $request){
        $grade = new GradeSystem();
        $grade->grade_name= $request->grade_name;

        $grade->grade_point= $request->grade_point;
        $grade->start_mark= $request->start_mark;
        $grade->end_mark= $request->end_mark;
        $grade->start_point= $request->start_point;
        $grade->end_point= $request->end_point;
        $grade->remark= $request->remark;

        $grade->save();

        $notification = [
            'type'=>'success',
            'message'=>'Grade Added successfully'
        ];

        return redirect()->route('grade.view')->with($notification);


    }//End Method

    public function GradeEdit($id){
       $data['grade'] =  GradeSystem::find($id);

       return view('backend.marks.grade_edit', $data);
    }//End Method


    public function GradeUpdate($id, Request $request){
        $grade =  GradeSystem::find($id);

        $grade->grade_name= $request->grade_name;

        $grade->grade_point= $request->grade_point;
        $grade->start_mark= $request->start_mark;
        $grade->end_mark= $request->end_mark;
        $grade->start_point= $request->start_point;
        $grade->end_point= $request->end_point;
        $grade->remark= $request->remark;

        $grade->save();

        $notification = [
            'type'=>'success',
            'message'=>'Grade Update successfully'
        ];

        return redirect()->route('grade.view')->with($notification);

    }//End MEthod


    public function GradeDelete($id){
        $del = GradeSystem::destroy($id);

        $notification = [
            'type'=>'error',
            'message'=>'Grade Delete successfully'
        ];

        return redirect()->route('grade.view')->with($notification);
    }
}
