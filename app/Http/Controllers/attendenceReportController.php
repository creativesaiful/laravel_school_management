<?php

namespace App\Http\Controllers;

use App\Models\employeeAttendence;
use Illuminate\Http\Request;
use App\Models\User;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
class attendenceReportController extends Controller
{
    public function employeeAttendence(){
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.reports.attendance_report_view', $data);
    }


    public function employeeAttendenceSearch(Request $request){


        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date.'%'];
        }

        $single_attendance = employeeAttendence::with(['UserData'])->where($where)->get();
        if ($single_attendance == true) {
            $data['allData'] = employeeAttendence::with(['UserData'])->where($where)->get();
            $data['absents'] = employeeAttendence::with(['UserData'])->where($where)->where('attend_status', 'Absent')->get()->count();
            $data['leaves'] = employeeAttendence::with(['UserData'])->where($where)->where('attend_status', 'Leave')->get()->count();
            $data['presents'] = employeeAttendence::with(['UserData'])->where($where)->where('attend_status', 'Present')->get()->count();
            $data['month'] = date('F', strtotime($request->date));

            $pdf = PDF::loadView('backend.reports.attendance_report_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('attendance_report.pdf');

        }else{
            $notification = array(
                'message' => 'No Data Found',
                'type' => 'error'
            );
            return redirect()->back()->with($notification);
        }




    }
}
