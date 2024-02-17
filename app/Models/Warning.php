<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id','warning_type','subject','role_type_id','warning_date','discription',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // id 	employee_id 	warning_type 	subject 	warning_by 	warning_date 	description 	created_at 	updated_at 	
}
