<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrolles extends Model
{
    use HasFactory;

    protected $table = 'payrolles';

    protected $fillable = [
        'employee_id','basic','month_of_salary','dine_allowance', 'conveneynce_allowance', 'medical_allowance', 'allowance', 'rent_allowance','gross_salary','tds','esi','pf','leave','prof_tax','leabour_welfare','net_salary','status','created_by',
    ];

    // employee_id 	basic 	month_of_salary 	dine_allowance 	conveneynce_allowance 	medical_allowance 	allowance 	rent_allowance 	gross_salary 	tds 	esi 	pf 	leave 	prof_tax 	leabour_welfare 	net_salary 	status 	created_by 
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // public function salarySheets(){
    //     return $this->belongsTo(Salary_Sheets::class, 'salary_sheets_id');
    // }

    public function advance(){
        return $this->belongsTo(Advance::class, 'advance_id');
    }
}



