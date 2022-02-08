<?php

namespace App\Http\Controllers;

use App\Models\employeeLeave;
use App\Models\leavePurpose;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class employeeLeveController extends Controller
{
    public function EmployeeleaveView(){

        $data['AllLive']=employeeLeave::orderBy('id', 'DESC')->get();
        return view('backend.employee.leave.leave_view', $data);
    }//End Method


    public function EmployeeleaveAdd(){
        $data['AllEmployee'] = User::where('usertype', 'employee')->orderBy('name', 'ASC')->get();

        return view('backend.employee.leave.leave_add', $data);

    }//End Method

    public function EmployeeleaveStore(Request $request){

        $leave = new employeeLeave();
        $leave ->employee_id = $request->employee_id;
        $leave->leave_purpose =  $request->leave_purpose;
        $leave->start_date = date('Y-m-d', strtotime($request->start_date)) ;
        $leave->end_date = date('Y-m-d', strtotime($request->end_date)) ;
        $leave->created_at = Carbon::now();

        $leave->save();

        $notification = [
            'type' => 'success',
            'message' => 'Leave Added successfully'
        ];

        return redirect()->route("employee.leave.view")->with($notification);

    }//End Method


    public function EmployeeleaveEdit($id){
        $singleleave = employeeLeave::find($id);


        return view('backend.employee.leave.leave_edit', compact('singleleave'));
    }//End Method

    public function EmployeeleaveUpdate(Request $request, $id){
        $leaveinfo = employeeLeave::find($id);
        $leaveinfo->leave_purpose = $request->leave_purpose;
        $leaveinfo->start_date = $request->start_date;
        $leaveinfo->end_date = $request->end_date;
        $leaveinfo->updated_at = Carbon::now();
        $leaveinfo->save();


        $notification = [
            'type' => 'success',
            'message' => 'Leave Update successfully'
        ];

        return redirect()->route("employee.leave.view")->with($notification);

    }//End Method

    public function EmployeeleaveDelete($id){
        $leaveinfo = employeeLeave::find($id);

        $leaveinfo->delete();
        $notification = [
            'type' => 'error',
            'message' => 'Leave Delete successfully'
        ];

        return redirect()->route("employee.leave.view")->with($notification);





    }//End Method
}
