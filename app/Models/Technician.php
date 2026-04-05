<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model{
    Protected $fillable = ["name"];
    
     public function assignments()
    {
        return $this->hasMany(Maintenance::class);
    }
}

