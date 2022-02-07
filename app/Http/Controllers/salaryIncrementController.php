<?php

namespace App\Http\Controllers;

use App\Models\employeeSalary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class salaryIncrementController extends Controller
{
    public function salaryView(){
        $data['allEmployee'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.salary.salary_view',  $data);
    }//End Method


    public function salaryIncrement($emply_id){
        $data['emplyDetails']= User::find($emply_id);

        return view('backend.employee.salary.salary_incremetn', $data);
    }//End Method

    public function salaryIncrementStore(Request $request, $id){
        $employee = User::find($id);

        $previous_salary = $employee->salary;

        $present_salary = (float)$previous_salary+(float)$request->increment_salary;

        $employee->salary = $present_salary;
        $employee->save();

        $emply_salary = new employeeSalary();
        $emply_salary->employee_id = $id;
        $emply_salary->previous_salary = $previous_salary;
        $emply_salary->present_salary = $present_salary;
        $emply_salary->increment_salary = (float)$request->increment_salary;

        $emply_salary->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $emply_salary->updated_at = Carbon::now();

        $emply_salary->save();

        $notification = [
            'type' => 'success',
            'message' => 'Salary Updated successfully'
        ];

        return redirect()->route("employee.salary.view")->with($notification);



    }//End Method

    public function salaryIncrementHistory($id){

        $data['employee_info']= User::find($id);
        $data['increment_info'] = employeeSalary::where('employee_id', $id)->orderBy('effected_salary', 'DESC')->get();
        return view("backend.employee.salary.increment_history", $data);
    }
}
