<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary_Sheets extends Model
{
    use HasFactory;

    protected $table = 'salary_sheets';

    protected $fillable = [
        'employee_id','basic','daily_rate','dine_allowance','conveneynce_allowance', 'madical_allowance', 'rent_allowance', 'gross_salary', 'created_by', 'status',
    ];
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}


