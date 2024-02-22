<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary_Sheets extends Model
{
    use HasFactory;

    protected $table = 'salary_details';

    protected $fillable = [
        'employee_id','basic','daily_rate','hourly_rate', 'created_by', 'status',
    ];
    

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}


