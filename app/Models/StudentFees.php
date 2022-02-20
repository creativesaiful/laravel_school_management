<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Year;
use App\Models\AllClass;
use App\Models\User;
use App\Models\Feecate;
use App\Models\FeeAmount;

class StudentFees extends Model
{
    use HasFactory;

    public function year(){
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }//Relation with year table

    public function class(){
        return $this->belongsTo(AllClass::class, 'class_id', 'id');
    }//Relation with All Calss Table

    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');

    }//Relation with user table

    public function feeCate(){
        return $this->belongsTo(Feecate::class, 'fee_category_id', 'id');
    }//Relation with Feecate table

    public function amount(){
        return $this->belongsTo(FeeAmount::class, 'amount', 'id');
    }


}
