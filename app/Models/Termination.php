<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id','termination_type','subject','role_type_id','notice_date','terminated_date','discription',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
