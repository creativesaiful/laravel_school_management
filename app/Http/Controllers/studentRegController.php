<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assign_student;
use App\Models\Year;
use App\Models\Shift;
use App\Models\AllClass;
use App\Models\Group;



class studentRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $stuInfo = assign_student::all();
        return view('backend.student_reg.view', ['stuInfo'=>$stuInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['year'] = Year::orderBy('year','DESC')->get();
        $data['shift'] = Shift::orderBy('shift_name','ASC')->get();
        $data['allclass'] = AllClass::orderBy('class_name','ASC')->get();
        $data['group'] = Group::orderBy('group_name','ASC')->get();


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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
