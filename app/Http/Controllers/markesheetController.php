<?php

namespace App\Http\Controllers;

use App\Models\GradeSystem;
use App\Models\StudentMarks;
use Illuminate\Http\Request;

class markesheetController extends Controller
{
    public function MarksheetView(){

       $data['yearList'] =  StudentMarks::with('yearinfo')->select('year_id')->groupBy('year_id')->orderBy('year_id', 'DESC')->get();

       $data['classList'] =  StudentMarks::with('classinfo')->select('class_id')->groupBy('class_id')->orderBy('class_id', 'DESC')->get();

       $data['examList'] =  StudentMarks::with('examinfo')->select('exam_id')->groupBy('exam_id')->orderBy('exam_id', 'DESC')->get();

        return view('backend.marksheet.marksheet_view', $data );
    }//End Method

    public function MarksheetSearch(Request $request){

        $validated = $request->validate([
            'year_id' => 'required',
            'class_id' => 'required',
            'exam_id' => 'required',
            'id_no' => 'required',
        ]);

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_id = $request->exam_id;
        $id_no = $request->id_no;

        $fail_count = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_id', $exam_id)->where('id_no', $id_no)->where('marks','<',33)->get()->count();

        $singStu = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_id', $exam_id)->where('id_no', $id_no)->first();

        if( $singStu){
            $allMarks = StudentMarks::with(['studentInfo','classinfo','assignstu','subjectinfo', 'yearinfo','examinfo'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_id', $exam_id)->where('id_no', $id_no)->get();

            $allGrade = GradeSystem::all();



            return view('backend.marksheet.markshet_pdf', compact('fail_count','allMarks','allGrade', ));
        }else{
            $notification = [
                'type'=>'error',
                'message'=>'Student did not found'
            ];

            return back()->with($notification);
        }



        return $singStu;
    }
}
