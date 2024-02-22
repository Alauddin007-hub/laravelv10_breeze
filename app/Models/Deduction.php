<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $fillable=[
        'salary_sheets_id','Provident_fund','prof_tax','leabour_welfare','status'
    ];

    public function department(){
        return $this->belongsTo(Salary_Sheets::class);
    }
}

// id 	salary_sheets_id 	Provident_fund 	prof_tax 	leabour_welfare 	status 	created_by 	created_at 	updated_at 
