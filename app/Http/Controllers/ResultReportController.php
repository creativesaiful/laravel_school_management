<?php

namespace App\Http\Controllers;

use App\Models\AllClass;
use App\Models\Exam;
use App\Models\StudentMarks;
use App\Models\Year;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ResultReportController extends Controller
{
    public function ResullReportView(){
        $data['years'] = Year::all();
        $data['classes'] = AllClass::all();
        $data['exam_types'] = Exam::all();
        return view('backend.reports.student_result_view', $data);
    }

    public function ResultReportPdf(Request $request){

        $validated = $request->validate([
            'year_id' => 'required',
            'class_id' => 'required',
            'exam_id' => 'required',

        ]);

        $singleRow = StudentMarks::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('exam_id', $request->exam_id)->first();

        if($singleRow==true){
            $data['allData'] = StudentMarks::with(['studentInfo', 'yearinfo', 'classinfo', 'examinfo'])->select('year_id', 'class_id', 'exam_id', 'student_id')->where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('exam_id', $request->exam_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_id')->groupBy('student_id')->get();

            //return ( $data['allData']);
           // return view('backend.reports.student_result_pdf', $data);

           $pdf = PDF::loadView('backend.reports.student_result_pdf', $data);
           $pdf->SetProtection(['copy', 'print'], '', 'pass');
           return $pdf->stream('result_report.pdf');


        }else{
            $notification = [
                'type'=>'error',
                'message'=>'No Data Found'
            ];
                return redirect()->back()->with($notification);
            }




    }
}
