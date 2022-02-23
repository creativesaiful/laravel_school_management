<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\employeeAttendence;
use App\Models\employeePayment;
use App\Models\User;
use Illuminate\Http\Request;


class employeeSalaryController extends Controller
{
    public function PayemtView()
    {
        $data['employees'] = employeePayment::all();

        return view('backend.account_managment.employees_payment_view', $data);
    }


    public function PayemtAdd()
    {
        return view('backend.account_managment.employees_payment_add');
    } //End


    //ajax for payment search
    public function PaymentSearch(Request $request)
    {

        $date = date('Y-m', strtotime($request->date));
        if ($date != null) {
            $where[] = ['date', 'like', $date . '%'];
        }

        $employeeInfo = employeeAttendence::select('employee_id')->with(['UserData'])->groupBy('employee_id')->where($where)->get();


        return response()->json($employeeInfo);
    } //End

    public function PaymentDesignationSearch(Request $request, $id)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date != null) {
            $where[] = ['date', 'like', $date . '%'];
        }

        $designation = Designation::find($id);

        $absent =  count(employeeAttendence::where('employee_id', $request->empId)->where($where)->where('attend_status', 'Absent')->get());


        return response()->json(array('designation' => $designation, 'absent' => $absent));
    } //Ajax for designation serach and   absent count


    public function PaymentSotre(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        if ($date != null) {
            $where[] = ['date', 'like', $date . '%'];
        }

        $pay = count(employeePayment::where($where)->get());


        $count = count($request->employee_id);

        if ($pay>0) {


            $notification = [
                'type' => 'error',
                'message' => 'Payment Already Added'
            ];

            return redirect()->route("employees.payment.view")->with($notification);



        } else {

            for ($i = 0; $i < $count; $i++) {
                $payment = new employeePayment();
                $payment->employee_id = $request->employee_id[$i];
                $payment->date = $date;

                $amount = 'amount' . $payment->employee_id;
                $payment->amount = $request->$amount;
                $payment->save();
            }

            $notification = [
                'type' => 'success',
                'message' => 'Payment successfully Completed'
            ];

            return redirect()->route("employees.payment.view")->with($notification);

        }





    }
}
