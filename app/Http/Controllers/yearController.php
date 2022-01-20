<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;

class yearController extends Controller
{
    public function viewYear(){
        $yearList = Year::latest()->get();

        return view('backend.year.view', ['yearList'=> $yearList]);
     }//end Method


     public function storeYear(Request $request){



       $request->validate([
           'year'=>'required |min:3|unique:years,year',
        ]);


        Year::insert([
            'year'=>$request->year,
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Year added successfully'
        ];

        return back()->with($notification );



    }//ENd method


    public function editYear($id){
        $yearinfo =  Year::find($id);

         return view('backend.year.edit', ['yearinfo'=>$yearinfo]) ;
     }//End Method


     public function updateYear(Request $request){

        $request->validate([
            'year'=>'required |min:3|unique:years,year',
        ]);

        Year::where('id', $request->id)->update([
            'year'=> $request->year,
        ]);


        $notification = [
            'type'=>'info',
            'message'=>'Year updated successfully'
        ];

        return redirect()->route('view.year')->with($notification);



    }//End Method


    public function deleteYear($id){
        Year::destroy($id);
        return back();
    }
}
