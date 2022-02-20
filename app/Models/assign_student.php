<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_student extends Model
{
    use HasFactory;

    function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    function student_class(){
        return $this->belongsTo(AllClass::class, 'class_id', 'id');
    }



    function student_year(){
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    function student_group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    function student_shift(){
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    function discount_info(){
        return $this->belongsTo(Discount_sutdent::class, 'id', 'assign_student_id');
    }


}
