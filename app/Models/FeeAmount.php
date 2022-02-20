<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AllClass;
class FeeAmount extends Model
{
    use HasFactory;
     protected $fillable = [
        'fee_category_id',
        'fee_amount',
        'class_id'

    ];

    public function feeCate(){
        return $this->belongsTo(Feecate::class,'fee_category_id' ,'id');
    }

    public function classId(){
        return $this->belongsTo(AllClass::class, 'class_id', 'id');
    }
}
