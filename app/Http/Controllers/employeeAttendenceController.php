<?php

namespace App\Http\Controllers;

use App\Models\employeeAttendence;
use App\Models\User;
use Illuminate\Http\Request;

class employeeAttendenceController extends Controller
{
    public function EmployeeAttendenceView(){
        $data['attendenceInfo']= employeeAttendence::select('date')->groupBy('date')-> orderBy('date', 'DESC')->get();
        //$data['attendenceInfo']= employeeAttendence::orderBy('date', 'DESC')->get();

        return view('backend.employee.attendence.attendence_view', $data);
    }//End Method


    public function EmployeeAttendenceDetails($date){
        $data['attendenceInfo'] = employeeAttendence::with(['UserData'])->where('date', $date)->orderBy('date', 'DESC')->get();

        return view('backend.employee.attendence.attendence_details', $data);
    }

    public function EmployeeAttendenceAdd(){
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.attendence.attendence_add', $data);
    }//End Method

    public function EmployeeAttendenceStore(Request $request){

        $epmNumber = count($request->employee_id);
        for ($i=0; $i <$epmNumber ; $i++) {
            $attend_status = 'attend_status'.$i;


            $attend = new employeeAttendence();
            $attend->employee_id =  $request->employee_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->attend_status = $request->$attend_status;
            $attend->save();


        }

        $notification = [
            'type' => 'success',
            'message' => 'Attendence Added successfully'
        ];

        return redirect()->route("employee.attendence.view")->with($notification);

    }//End Method

    public function EmployeeAttendenceEdit($date){
        $data['employees'] = employeeAttendence::where('date', $date)->orderBy('date', 'DESC')->get();

        return view('backend.employee.attendence.attendence_edit', $data);




    }//End Method

    public function EmployeeAttendenceUpdate(Request $request, $date){

        $del = employeeAttendence::where('date', $date)->delete();

        $epmNumber = count($request->employee_id);
        for ($i=0; $i <$epmNumber ; $i++) {
            $attend_status = 'attend_status'.$i;

            $attend = new employeeAttendence();
            $attend->employee_id =  $request->employee_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        $notification = [
            'type' => 'success',
            'message' => 'Attendence Updated successfully'
        ];

        return redirect()->route("employee.attendence.view")->with($notification);

    }
}
