<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
class examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examInfo = Exam::latest()->get();
        return view("backend.exam.view", compact('examInfo') );
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
            'exam_name'=>'required',
        ]);

        Exam::insert([
            'exam_name'=>$request->exam_name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Exam added successfully'
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
        $examInfo = Exam::find($id);
        return view('backend.exam.edit', compact('examInfo'));
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
        $request->validate([
            'exam_name'=>'required',
        ]);

        Exam::where('id', $request->id)->update([
            'exam_name'=> $request->exam_name,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Exam updated successfully'
        ];

        return redirect()->route('exam.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::destroy($id);
        return back();
    }
}
