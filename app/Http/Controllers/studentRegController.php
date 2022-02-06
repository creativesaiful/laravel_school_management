<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assign_student;
use App\Models\Year;
use App\Models\Shift;
use App\Models\AllClass;
use App\Models\Discount_sutdent;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class studentRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stuInfo = assign_student::all();
        return view('backend.student_reg.view', ['stuInfo' => $stuInfo]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['year'] = Year::orderBy('year', 'DESC')->get();
        $data['shift'] = Shift::orderBy('shift_name', 'ASC')->get();
        $data['allclass'] = AllClass::orderBy('class_name', 'ASC')->get();
        $data['group'] = Group::orderBy('group_name', 'ASC')->get();


        return view('backend.student_reg.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
        //code with image
        $imgPath = $request->file('img');

        $imgName = 'student-photos/' . hexdec(rand()) . '.' . $imgPath->getClientOriginalExtension();
        $imgPath->move('storage/student-photos', $imgName);

        //code for auto generate id

        $previousStudent = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

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
            $LastStuId = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
            $newStuId = $LastStuId + 1;

            if ($newStuId < 10) {
                $id_number = '000' . $newStuId;
            } elseif ($newStuId < 100) {
                $id_number = '00' . $newStuId;
            } elseif ($newStuId < 1000) {
                $id_number = '0' . $newStuId;
            }
        }


        $yearname = Year::find($request->year_id)->year;

        $user = new User();
        $user->name = $request->name;
        $user->usertype = 'Student';
        $user->password = Hash::make('123456789');
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->image = $imgName;

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->religion = $request->religion;

        $user->id_no = $yearname . $id_number;

        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->save();


        $stu_asign = new assign_student();
        $stu_asign->student_id = $user->id;
        $stu_asign->class_id = $request->class_id;
        $stu_asign->year_id = $request->year_id;
        $stu_asign->group_id = $request->group_id;
        $stu_asign->shift_id = $request->shift_id;

        $stu_asign->save();


        $discount = new Discount_sutdent();
        $discount->assign_student_id = $stu_asign->id;
        $discount->fee_cata_id = '2';
        $discount->discount = $request->discount;

        $discount->save();


        $notification = [
            'type' => 'info',
            'message' => 'Student Registred successfully'
        ];

        return redirect()->route("student.index")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['stuInfo']= assign_student::find($id);
        $data['year'] = Year::orderBy('year', 'DESC')->get();
        $data['shift'] = Shift::orderBy('shift_name', 'ASC')->get();
        $data['allclass'] = AllClass::orderBy('class_name', 'ASC')->get();
        $data['group'] = Group::orderBy('group_name', 'ASC')->get();

        return view('backend.student_reg.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stu_id)
    {
        if($request->file('img')){
          $user =   User::where('id', $stu_id)->first();

          @unlink(public_path('storage/'.$user->image));
        $imgPath = $request->file('img');

        $imgName = 'student-photos/'. hexdec(rand()).'.'.$imgPath->getClientOriginalExtension();
        $imgPath->move('storage/student-photos', $imgName);
        }else{
            $user =   User::where('id', $stu_id)->first();
            $imgName = $user->image;
        }

        $user = User::where('id', $stu_id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->image = $imgName;

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->religion = $request->religion;


        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->save();


        $stu_asign = assign_student::where('student_id', $stu_id)->first();
        $stu_asign->class_id = $request->class_id;
        $stu_asign->year_id = $request->year_id;
        $stu_asign->group_id = $request->group_id;
        $stu_asign->shift_id = $request->shift_id;

        $stu_asign->save();


        $discount = Discount_sutdent::where('assign_student_id', $request->id)->first();
        $discount->fee_cata_id = '2';
        $discount->discount = $request->discount;

        $discount->save();

        $notification = [
            'type' => 'info',
            'message' => 'Student Updated successfully'
        ];

        return redirect()->route("student.index")->with($notification);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stuInfo= assign_student::find($id)->first();
        $userInfo =  User::where('id', $stuInfo->student_id );
        return $stuInfo;//NOt done,
    }
}
