<?php

namespace App\Http\Controllers;

use App\Models\OtherCost;
use Illuminate\Http\Request;

class othercostController extends Controller
{
    public function otherCostView(){

        $data['otherCost'] = OtherCost::orderBY('date', 'DESC')->get();

        return view('backend.account_managment.othercost_view', $data);
    }//ENd

    public function otherCostStore(Request $request){

        $imgPath = $request->file('image');

        $imgName = 'cost-photos/' . hexdec(rand()) . '.' . $imgPath->getClientOriginalExtension();
        $imgPath->move('storage/cost-photos', $imgName);


        $cost = new OtherCost();

        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->description = $request->description;
        $cost->amount = $request->amount;
        $cost->image = $imgName;
        $cost->save();

        $notification = [
            'type' => 'success',
            'message' => 'Cost Added successfully'
        ];

        return back()->with($notification);
    }//End Method


    public function otherCostEdit($id){
       $data['costInfo'] =  OtherCost::find($id);

       return view('backend.account_managment.othercost_edit', $data);
    }//End

    public function otherCostUpdate(Request $request, $id){

        if($request->file('image')){
            $cost =   OtherCost::find($id);

            @unlink(public_path('storage/'.$cost->image));
          $imgPath = $request->file('image');

          $imgName = 'cost-photos/'. hexdec(rand()).'.'.$imgPath->getClientOriginalExtension();
          $imgPath->move('storage/cost-photos', $imgName);
          }else{
            $cost =   OtherCost::find($id);
              $imgName = $cost->image;
          }

        $costinfo = OtherCost::find($id);

        $costinfo->date = date('Y-m-d', strtotime($request->date));
        $costinfo->description = $request->description;
        $costinfo->amount = $request->amount;
        $costinfo->image = $imgName;
        $costinfo->save();

        $notification = [
            'type' => 'info',
            'message' => 'Cost updated successfully'
        ];

        return redirect()->route('othercost.view')->with($notification);

    }
}
