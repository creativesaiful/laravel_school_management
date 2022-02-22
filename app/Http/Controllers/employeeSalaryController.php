<?php

namespace App\Http\Controllers;

use App\Models\employeeAttendence;
use App\Models\employeePayment;
use App\Models\User;
use Illuminate\Http\Request;

class employeeSalaryController extends Controller
{
   public function PayemtView(){
       $data['employees'] = employeePayment::all();

       return view('backend.account_managment.employees_payment_view', $data);
   }


   public function PayemtAdd(){
    return view('backend.account_managment.employees_payment_add' );
   }//End


   //ajax for payment search
   public function PaymentSearch(Request $request){

        $date = date('Y-m', strtotime($request->date));
        if($date!=null){
            $where[]= ['date', 'like', $date.'%'];
        }

       $employeeInfo = employeeAttendence::select('employee_id')->groupBy('employee_id')->where($where)->get();



        $totalAttend = array();
        $absentCount = array();
       foreach ($employeeInfo as $employee) {



        $totalAttend[] = employeeAttendence::with('UserData')->where('employee_id', $employee->employee_id)->where($where)->get();

       // $absentCount[] = count($totalAttend->where('attend_status', 'Absent'));


       }




      return response()->json(array(['totalAttend'=>$totalAttend]));




    }
}
