<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname','uuid',
        'email','phone',
        'department_id','designation_id','company','avatar',
    ];


    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
