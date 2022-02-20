<?php

namespace App\Http\Controllers;

use App\Models\AllClass;
use App\Models\assign_student;
use App\Models\FeeAmount;
use App\Models\Feecate;
use App\Models\StudentFees;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function FeesView(){
       $data['feeInfo'] =  StudentFees::with(['year', 'class', 'student', 'feeCate', 'amount'])->get();
        return view('backend.account_managment.stu_fees_view', $data);
    }//End Method

    public function FeesAdd(){
        $data['year'] = Year::orderBy('year', 'DESC')->get();
        $data['allclass'] = AllClass::orderBy('id', 'DESC')->get();
        $data['feeCate'] = Feecate::get();

        return view('backend.account_managment.stu_fees_add', $data);
    }//End Method


    public function FeesSearch(Request $request){
        $students =  assign_student::with(['student', 'student_class', 'student_year','discount_info'])
        ->where('class_id', $request->classId)
        ->where('year_id', $request->yearId)
        ->get();

        $feeInfo = FeeAmount::with(['feeCate'])->where('class_id',$request->classId )->where('fee_category_id', $request->feeCategoryId)->first();



         return response()->json(array(
             'allStu'=>$students,
             'feeInfo'=> $feeInfo

            ));
    }//End Method
}
