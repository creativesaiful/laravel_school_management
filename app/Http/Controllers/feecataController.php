<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCate;


class feecataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feecateInfo = FeeCate::latest()->get();

        return view('backend.feecate.view' , ['feecateInfo'=>$feecateInfo]);
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
            'fee_cata_name'=>'required|unique:feecates,fee_cata_name',
        ]);

        FeeCate::insert([
            'fee_cata_name'=>$request->fee_cata_name,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Fees Category added successfully'
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
        $feecateInfo = FeeCate::find($id);
        return view('backend.feecate.edit', ['feecateInfo'=>$feecateInfo]);
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


        FeeCate::where('id', $request->id)->update([
            'fee_cata_name'=> $request->fee_cata_name,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Fees Category updated successfully'
        ];

        return redirect()->route('feecata.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FeeCate::destroy($id);
        return back();
    }
}
