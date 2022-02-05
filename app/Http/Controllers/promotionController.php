<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assign_student;
use App\Models\Year;
use App\Models\Shift;
use App\Models\AllClass;
use App\Models\Group;
use App\Models\Discount_sutdent;

class promotionController extends Controller
{
    public function EditPromotion($id){

        $data['stuInfo']= assign_student::find($id);
        $data['year'] = Year::orderBy('year', 'DESC')->get();
        $data['shift'] = Shift::orderBy('shift_name', 'ASC')->get();
        $data['allclass'] = AllClass::orderBy('class_name', 'ASC')->get();
        $data['group'] = Group::orderBy('group_name', 'ASC')->get();

        return view('backend.student_reg.promotion', $data);
    }

    public function PromoteStudent(Request $request,$student_id){

        $stu_asign = assign_student::where('student_id', $student_id)->first();
        $stu_asign->class_id = $request->class_id;
        $stu_asign->year_id = $request->year_id;
        $stu_asign->group_id = $request->group_id;
        $stu_asign->shift_id = $request->shift_id;
        $stu_asign->roll = $request->roll;

        $stu_asign->save();

        $discount = Discount_sutdent::where('assign_student_id', $stu_asign->id)->first();
        $discount->fee_cata_id = '2';
        $discount->discount = $request->discount;
        $discount->save();


        $notification = [
            'type' => 'info',
            'message' => 'Student Promoted successfully'
        ];

        return redirect()->route("student.index")->with($notification);
    }
}
