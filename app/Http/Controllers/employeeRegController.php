<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\employeeSalary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use PDF;

class employeeRegController extends Controller
{
    public function employeeView()
    {
        $employee = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_view', compact('employee'));
    } //End Method

    public function employeeAdd()
    {
        $desigInfo = Designation::all();
        return view('backend.employee.employee_add', compact('desigInfo'));
    } //End Method


    public function employeeStore(Request $request)
    {

        //code with image
        $imgPath = $request->file('img');

        $imgName = 'employee-photos/' . hexdec(rand()) . '.' . $imgPath->getClientOriginalExtension();
        $imgPath->move('storage/employee-photos', $imgName);

        //code for auto generate id

        $previousStudent = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first();

        if ($previousStudent == null) {
            $start = 0;
            $firstId = $start + 1;
            if ($firstId < 10) {
                $id_number = '000' . $firstId;
            } elseif ($firstId < 100) {
                $id_number = '00' . $firstId;
            } elseif ($firstId < 1000) {
                $id_number = '0' . $firstId;
            }
        } else {
            $LastStuId = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first()->id;
            $newStuId = $LastStuId + 1;

            if ($newStuId < 10) {
                $id_number = '000' . $newStuId;
            } elseif ($newStuId < 100) {
                $id_number = '00' . $newStuId;
            } elseif ($newStuId < 1000) {
                $id_number = '0' . $newStuId;
            }
        }

        $user = new User();
        $user->name = $request->name;
        $user->usertype = 'employee';
        $user->password = Hash::make('123456789');
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->image = $imgName;

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->religion = $request->religion;

        $user->id_no = $id_number;

        $user->dob = date('Y-m-d', strtotime($request->dob));

        $user->join_date = date('Y-m-d', strtotime($request->join_date));

        $user->designation_id = $request->designation_id;

        $user->salary = $request->salary;
        $user->email= $request->email;

        $user->save();


        $employee_salary = new employeeSalary();
        $employee_salary->employee_id = $user->id;
        $employee_salary->previous_salary = $request->salary;
        $employee_salary->present_salary = $request->salary;
        $employee_salary->increment_salary ='0';
        $employee_salary->created_at = Carbon::now();
        $employee_salary->save();

        $notification = [
            'type' => 'success',
            'message' => 'Employee Added successfully'
        ];

        return redirect()->route("view.employee")->with($notification);
    }//End Method


    public function employeeEdit($id){
        $employee_infos = User::find($id);
        $designation_infos = Designation::all();

        return view('backend.employee.employee_edit', compact('employee_infos', 'designation_infos'));
    }//End Method


    public function employeeUpdate(Request $request,$emply_id){
        if($request->file('img')){
            $user =   User::where('id', $emply_id)->first();

           @unlink(public_path('storage/'.$user->image));
          $imgPath = $request->file('img');

          $imgName = 'employee-photos/'. hexdec(rand()).'.'.$imgPath->getClientOriginalExtension();
          $imgPath->move('storage/employee-photos', $imgName);
          }else{
              $user =   User::where('id', $emply_id)->first();
              $imgName = $user->image;
          }

          $user = User::find($emply_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->image = $imgName;

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->religion = $request->religion;



        $user->dob = date('Y-m-d', strtotime($request->dob));

        $user->join_date = date('Y-m-d', strtotime($request->join_date));

        $user->designation_id = $request->designation_id;
        $user->email= $request->email;

        $user->save();

        $notification = [
            'type' => 'success',
            'message' => 'Employee Updated successfully'
        ];

        return redirect()->route("view.employee")->with($notification);







    }//End Method

    public function EmployeeDetailsPdf($id){
        $data['details'] = User::with('designation')->where('id',$id )->first();

        $pdf = PDF::loadView('backend.employee.employee_detaisl_pdf', $data);
        return $pdf->stream('document.pdf');
    }
}
