<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subList = Subject::latest()->get();

       return view('backend.subject.view', ['subList'=>$subList]);
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
            'subject'=>'unique:subjects,subject',
        ]);

       $storeSubject =  Subject::insert([
            'subject'=>$request->subject,
            'full_mark'=>$request->full_mark,
            'pass_mark'=>$request->pass_mark,
            'subjective_mark'=>$request->subjective_mark,

        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Subject added successfully'
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
        $subInfo = Subject::find($id);
        return view('backend.subject.edit', ['subInfo'=>$subInfo]);
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


        Subject::where('id', $id )->update([
            'subject'=>$request->subject,
            'full_mark'=>$request->full_mark,
            'pass_mark'=>$request->pass_mark,
            'subjective_mark'=>$request->subjective_mark,
        ]);
        $notification = [
            'type'=>'success',
            'message'=>'Subject Updated successfully'
        ];

        return redirect()->route('subject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::destroy($id);
        return back();
    }
}
