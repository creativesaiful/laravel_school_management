<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Shift;
use App\Models\AllClass;
use App\Models\assign_student;
use App\Models\Group;
use App\Models\Subject;

class MarksController extends Controller
{
    public function MarksEntryView(){
        // $data['year'] = Year::orderBy('year', 'DESC')->get();
        // $data['shift'] = Shift::orderBy('shift_name', 'ASC')->get();
        // $data['allclass'] = AllClass::orderBy('class_name', 'ASC')->get();
        // $data['group'] = Group::orderBy('group_name', 'ASC')->get();

        $data['subject'] = Subject::orderBy('subject', 'ASC')->get();

        $data ['stuInfo'] = assign_student::with(['student_class', 'student_year', 'student_group', 'student_shift'])->get();



        return view('backend.marks.marks_entry', $data);
    }//End Method

    public function MarksSearch(Request $request){

           $allStu =  assign_student::where('year_id', $request->yearId)->where('class_id',  $request->classId)->where('group_id',  $request->groupId)->where('shift_id',  $request->shiftId)->get();


      return response()->json($allStu);
    }
}
