<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'user_id', 
        'company_name',
        'phone',
    ];
    public function supplyRequests()
    {
        return $this->hasMany(Supply_request::class);
    }
}
