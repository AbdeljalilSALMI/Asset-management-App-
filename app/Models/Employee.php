<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
        'user_id',  'name', 'function', 'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    // in app/Models/Employee.php
public function user()
{
    return $this->belongsTo(User::class);
}


   
}
