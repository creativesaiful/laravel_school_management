<?php

namespace App\Http\Controllers;

use App\Models\assign_student;
use Illuminate\Http\Request;

use PDF;

class pdfController extends Controller
{
   public function studentDetailsPdf($stu_id){

    $data['details'] = assign_student::with('student', 'discount_info')->where('student_id',$stu_id )->first();

	$pdf = PDF::loadView('backend.student_reg.student_detaisl_pdf', $data);
	return $pdf->stream('document.pdf');




   }
}
