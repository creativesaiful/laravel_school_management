<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;
     protected $fillable = [
        'fee_category_id',
        'fee_amount'

    ];

    public function feeamount(){
        return $this->belongsTo(Feecate::class,'fee_category_id' ,'id');
    }
}
