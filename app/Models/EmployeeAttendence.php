<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendence extends Model
{
    use HasFactory;

    protected $table = 'employee_attendences';

    protected $fillable = [
        'employee_id','checkin','checkout', 'date', 'total_work_hours', 'status'
    ];
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
