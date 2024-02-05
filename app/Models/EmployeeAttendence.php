<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendence extends Model
{
    use HasFactory;

    protected $table = 'employee_attendances';

    protected $fillable = [
        'employee_id','checkin','checkout','status'
    ];
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
