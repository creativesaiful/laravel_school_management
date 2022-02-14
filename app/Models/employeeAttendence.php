<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class employeeAttendence extends Model
{
    use HasFactory;

    public function UserData(){
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
