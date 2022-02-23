<?php

namespace App\Http\Controllers;

use App\Models\employeePayment;
use App\Models\employeeSalary;
use App\Models\OtherCost;
use App\Models\StudentFees;
use Illuminate\Http\Request;

class profitController extends Controller
{
    public function profitView(){
        return view('backend.reports.monthly_profit_view');
    }//End

    public function profitDatewiseSearch(Request $request){
        $start_date = date('Y-m-d', strtotime($request->startDate));
        $sdate = date('Y-m', strtotime($request->startDate));

        $end_date = date('Y-m-d', strtotime($request->endDate));
        $edate = date('Y-m', strtotime($request->endDate));

        $stuFees = StudentFees::whereBetween('date', [$sdate, $edate])->sum('amount');

        $empSalary = employeePayment::whereBetween('date', [$sdate, $edate])->sum('amount');

        $otherCost = OtherCost::whereBetween('date', [$start_date, $end_date])->sum('amount');

        return response()->json(array([
            'stuFees'=> $stuFees,
            'empSalary'=> $empSalary,
            'otherCost'=> $otherCost,

        ]));



    }//End



}
