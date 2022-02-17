<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Shift;
use App\Models\AllClass;
use App\Models\assign_student;
use App\Models\Exam;
use App\Models\Group;
use App\Models\StudentMarks;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class MarksController extends Controller
{
    public function MarksEntryView(){

        // $data['shift'] = Shift::orderBy('shift_name', 'ASC')->get();



        $data['year'] = assign_student::select('year_id')->groupBy('year_id')->orderBy('year_id', 'DESC')->get();
        $data['allclass'] = assign_student::select('class_id')->groupBy('class_id')->orderBy('class_id', 'DESC')->get();

        $data['group'] = assign_student::select('group_id')->groupBy('group_id')->orderBy('group_id', 'DESC')->get();

        $data['shift'] = assign_student::select('shift_id')->groupBy('shift_id')->orderBy('shift_id', 'DESC')->get();


        $data['subject'] = Subject::orderBy('subject', 'ASC')->get();

        $data['exam'] = Exam::orderBy('exam_name', 'ASC')->get();

        //$data ['stuInfo'] = assign_student::with(['student_class', 'student_year', 'student_group', 'student_shift'])->get();



        return view('backend.marks.marks_entry', $data);
    }//End Method

    public function MarksSearch(Request $request){



        $allStu =  DB::table('assign_students')
        ->join('users', 'assign_students.student_id', '=', 'users.id')
        ->where('assign_students.class_id', $request->classId)
        ->where('assign_students.year_id', $request->yearId)
        ->where('assign_students.group_id', $request->gorupId)
        ->where('assign_students.shift_id', $request->shiftId)
        ->get();




           if($allStu ){
            return response()->json($allStu);
           }else{
            return response()->json('Sorry');
           }

    }//End Marksearch

    public function MarksStore(Request $request){

        $validated = $request->validate([
            'subject_id' => 'required',
            'exam_id' => 'required',
        ]);

        $stuCount = $request->student_id;

        for ($i=0; $i <count($request->student_id) ; $i++) {

            $data = new StudentMarks();
            $data->year_id = $request->year_id;
            $data->class_id = $request->class_id;
            $data->assign_subject_id = $request->subject_id;
            $data->exam_id = $request->exam_id;
            $data->id_no = $request->id_no[$i];
            $data->student_id = $request->student_id[$i];
            $data->marks = $request->marks[$i];

            $data->save();


        }

        $notification = [
            'type'=>'success',
            'message'=>'Marks Added successfully'
        ];

        return back()->with($notification);

    }//End Method


    public function MarksEdit(){


        $data['year'] = StudentMarks::select('year_id')->groupBy('year_id')->orderBy('year_id', 'DESC')->get();
        $data['allclass'] = StudentMarks::select('class_id')->groupBy('class_id')->orderBy('class_id', 'DESC')->get();



        $data['subject'] =  StudentMarks::select('assign_subject_id')->groupBy('assign_subject_id')->orderBy('assign_subject_id', 'DESC')->get();

        $data['exam'] = StudentMarks::select('exam_id')->groupBy('exam_id')->orderBy('exam_id', 'DESC')->get();

        //$data ['stuInfo'] = assign_student::with(['student_class', 'student_year', 'student_group', 'student_shift'])->get();



        return view('backend.marks.marks_edit', $data);
    }//End Method




    public function MarksSearchForEdit(Request $request){



        $allStu =  StudentMarks::with(['studentInfo', 'assignstu'])
        ->where('class_id', $request->classId)
        ->where('year_id', $request->yearId)
        ->where('exam_id', $request->examId)
        ->where('assign_subject_id', $request->subjectId)
        ->get();



         return response()->json($allStu);


    }//End Marksearch




    public function MarksUpdateStore(Request $request){


        $validated = $request->validate([
            'subject_id' => 'required',
            'exam_id' => 'required',
        ]);

        $allStu =  StudentMarks::where('class_id', $request->class_id)
        ->where('year_id', $request->year_id)
        ->where('exam_id', $request->exam_id)
        ->where('assign_subject_id', $request->subject_id)
        ->delete();


        $stuCount = $request->student_id;

        for ($i=0; $i <count($request->student_id) ; $i++) {

            $data = new StudentMarks();
            $data->year_id = $request->year_id;
            $data->class_id = $request->class_id;
            $data->assign_subject_id = $request->subject_id;
            $data->exam_id = $request->exam_id;
            $data->id_no = $request->id_no[$i];
            $data->student_id = $request->student_id[$i];
            $data->marks = $request->marks[$i];

            $data->save();


        }

        $notification = [
            'type'=>'success',
            'message'=>'Marks Update successfully'
        ];

        return back()->with($notification);

    }//End Method


}
