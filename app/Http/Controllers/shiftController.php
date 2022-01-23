<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;


class shiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shiftInfo = Shift::latest()->get();

        return view('backend.shift.view' , ['shiftInfo'=>$shiftInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shift_name'=>'required|unique:shifts,shift_name',
        ]);

        Shift::insert([
            'shift_name'=>$request->shift_name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Shift added successfully'
        ];

        return back()->with($notification);
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
        $shiftInfo = Shift::find($id);
        return view('backend.shift.edit', ['shiftInfo'=>$shiftInfo]);
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


        Shift::where('id', $request->id)->update([
            'shift_name'=> $request->shift_name,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Shift updated successfully'
        ];

        return redirect()->route('shift.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shift::destroy($id);
        return back();
    }
}
