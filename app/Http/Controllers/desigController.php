<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
class desigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $desigInfo =  Designation::latest()->get();

       return view('backend.designation.view', ['desigInfo'=>$desigInfo]);
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
        $request->validate(
            [
                'name'=>'required|unique:designations,name'
            ]
        );
        Designation::insert([
            'name'=>$request->name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Designation Added successfully'
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
       $desigInfo =  Designation::find($id);

        return view('backend.designation.edit', ['desigInfo'=>$desigInfo]);
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
        Designation::where('id', $id)->update([
            'name'=> $request->name,
        ]);

        $notification = [
            'type'=>'info',
            'message'=>'Designation updated successfully'
        ];

        return redirect()->route('designation.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Designation::destroy($id);
        return back();
    }
}
