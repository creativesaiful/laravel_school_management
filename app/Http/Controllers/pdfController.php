<?php

namespace App\Http\Controllers;

use App\Models\assign_student;
use Illuminate\Http\Request;

use App\Models\StudentFees;
use App\Models\employeePayment;
use App\Models\OtherCost;

use PDF;

class pdfController extends Controller
{
   public function studentDetailsPdf($stu_id){

    $data['details'] = assign_student::with('student', 'discount_info')->where('student_id',$stu_id )->first();

	$pdf = PDF::loadView('backend.student_reg.student_detaisl_pdf', $data);
	return $pdf->stream('document.pdf');




   }

   public function ProfitDetailsPdf($startDate,$endDate ){

    $start_date = date('Y-m-d', strtotime($startDate));
        $sdate = date('Y-m', strtotime($startDate));

        $end_date = date('Y-m-d', strtotime($endDate));
        $edate = date('Y-m', strtotime($endDate));

        $data['month'] = date('F-Y', strtotime($startDate));

        $data['stuFees'] = StudentFees::whereBetween('date', [$sdate, $edate])->sum('amount');

        $data['empSalary'] = employeePayment::whereBetween('date', [$sdate, $edate])->sum('amount');

        $data['otherCost'] = OtherCost::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $data['totalCost'] = $data['empSalary'] + $data['otherCost'];

        $data['totalProfit'] = $data['stuFees'] - $data['totalCost'];


        $pdf = PDF::loadView('backend.reports.monthly_profit_pdf', $data);
        return $pdf->stream('document.pdf');
   }
}
