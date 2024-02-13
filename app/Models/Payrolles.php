<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrolles extends Model
{
    use HasFactory;

    protected $table = 'salary_sheets';

    protected $fillable = [
        'employee_id','salary_sheets_id','advance_id','pf', 'leave', 'prof_tax', 'leabour_welfare', 'created_by'
    ];
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function salarySheets(){
        return $this->belongsTo(Salary_Sheets::class, 'salary_sheets_id');
    }

    public function advance(){
        return $this->belongsTo(Advance::class, 'advance_id');
    }
}



