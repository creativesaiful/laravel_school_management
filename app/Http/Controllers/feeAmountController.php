<?php

namespace App\Http\Controllers;

use App\Models\AllClass;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\FeeCate;
class feeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $feeInfo =  FeeAmount::with('feeCate')->latest()->get();
       $feeCateInfo = FeeCate::orderBy('fee_cata_name', 'ASC')->get();
       $allClass = AllClass::orderBy('id','ASC')->get();

       return view('backend.feeamount.view', ['feeInfo'=>$feeInfo, 'feeCateInfo'=>$feeCateInfo, 'allClass'=>$allClass]);
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
            'fee_amount'=>'required',
            'fee_category_id'=>'required',
            'class_id'=>'required'

        ]);

        FeeAmount::insert([
            'fee_category_id'=>$request->fee_category_id,
            'fee_amount'=>$request->fee_amount,
            'class_id'=>$request->class_id


        ]);
        $notification = [
            'type'=>'success',
            'message'=>'Fees Amount added successfully'
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
       $feeAmountInfo =  FeeAmount::find($id);
       $feeCateInfo = FeeCate::orderBy('fee_cata_name', 'ASC')->get();
       $allClass = AllClass::orderBy('id','ASC')->get();

       return view('backend.feeamount.edit', ['feeAmountInfo'=>$feeAmountInfo, 'feeCateInfo'=>$feeCateInfo, 'allClass'=>$allClass]);
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
            'fee_category_id'=>'required',
            'fee_amount'=>'required',
            'class_id'=>'required'


        ]);

        FeeAmount::where('id', $id)->update([

            'fee_amount'=>$request->fee_amount,
            'fee_category_id'=>$request->fee_category_id,
            'class_id'=>$request->class_id

        ]);
        $notification = [
            'type'=>'success',
            'message'=>'Amount Updated successfully'
        ];

        return redirect()->route('feeamount.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FeeAmount::destroy($id);
        return back();
    }
}
