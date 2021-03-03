<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','address','salary','join_date','image','nid'
    ];

    public function salaries()
    {
        return $this->belongsTo(Salary::class, 'id', 'employee_id');
    }
}
