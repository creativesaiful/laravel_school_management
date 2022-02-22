<?php

namespace App\Http\Controllers;

use App\Models\AllClass;
use App\Models\assign_student;
use App\Models\FeeAmount;
use App\Models\Feecate;
use App\Models\StudentFees;
use App\Models\Year;
use Illuminate\Http\Request;
use Mpdf\Tag\Br;

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


    //ajax
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


    public function FeesStore(Request $request){

        $stuNum = count($request->student_id);
        for ($i=0; $i < $stuNum ; $i++) {
            $fee = new StudentFees();
            $fee->student_id = $request->student_id[$i];
            $fee->year_id = $request->year_id;
            $fee->class_id = $request->class_id;
            $fee->fee_category_id = $request->fee_category_id;

            $amount = 'amount'.$fee->student_id;
            $fee->amount = $request->$amount;
            $fee->date = date("Y-m", strtotime($request->date));
            $fee->save();



        }//End For

        $notification = [
            'type'=>'success',
            'message'=>'Fee added successfully'
        ];

        return redirect()->route("student.fees.view")->with($notification);


    }//End Method


    public function FeesEdit(){
       $data['yearInfo'] =  StudentFees::with('year')->select('year_id')->groupBy('year_id')->get();
         $data['classInfo'] =  StudentFees::with('class')->select('class_id')->groupBy('class_id')->get();
        $data['feeCateInfo'] =  StudentFees::with('feeCate')->select('fee_category_id')->groupBy('fee_category_id')->get();
        $data['dateInfo'] =  StudentFees::select('date')->groupBy('date')->get();

        return view('backend.account_managment.stu_fees_edit', $data);



     }//End Method


     public function FeesEditSearch(Request $request){
            $feesInfo =  StudentFees::with(['student'])
            ->where('year_id', $request->yearId)
            ->where('class_id', $request->classId)
            ->where('fee_category_id', $request->feeCategoryId)
            ->where('date', $request->date)
            ->get();


            $cateInfo = FeeAmount::where('class_id',$request->classId )->where('fee_category_id', $request->feeCategoryId)->first();
           //$discount =  assign_student::with('discount_info')->where('student_id', $feesInfo->student_id)->first();
            return response()->json(array(
                'feesInfo'=>$feesInfo,
                'cateInfo'=> $cateInfo,


               ));


     }//End Method

     public function FeesUpdate(Request $request){

       $del =  StudentFees::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $request->date)->delete();

        $stuNum = count($request->student_id);

        for ($i=0; $i < $stuNum ; $i++) {
            $fee = new StudentFees();
            $fee->student_id = $request->student_id[$i];
            $fee->year_id = $request->year_id;
            $fee->class_id = $request->class_id;
            $fee->fee_category_id = $request->fee_category_id;

            $amount = 'amount'.$fee->student_id;
            $fee->amount = $request->$amount;
            $fee->date = date("Y-m", strtotime($request->date));
            $fee->save();



        };//End For

        $notification = [
            'type'=>'success',
            'message'=>'Fee Updated successfully'
        ];

        return redirect()->route("student.fees.view")->with($notification);
     }

}
