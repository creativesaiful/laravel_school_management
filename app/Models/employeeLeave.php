<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leavePurpose;

use App\Models\User;
class employeeLeave extends Model
{
    use HasFactory;

    public function UserInfo(){
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }


}
