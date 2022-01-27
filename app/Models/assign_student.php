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
        return $this->belongsTo(Year::class, 'class_id', 'id');
    }
}
