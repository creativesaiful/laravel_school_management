<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AllClass;
use App\Models\Year;
use App\Models\Subject;
use App\Models\Exam;

class StudentMarks extends Model
{
    use HasFactory;

    public function studentInfo (){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }//Relation with user table (Js reads studentInfo as student_info )

    public function yearinfo(){
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }//Relation with Year Table


    public function classinfo(){
        return $this->belongsTo(AllClass::class, 'class_id', 'id');
    }//Relation with ALlClass table

    public function subjectinfo(){
        return $this->belongsTo(Subject::class, 'assign_subject_id', 'id');
    }//Relation with subject table

    public function examinfo(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }//

    public function assignstu(){
        return $this->belongsTo(assign_student::class, 'student_id', 'student_id');
    }//Relation with assign student table
}
