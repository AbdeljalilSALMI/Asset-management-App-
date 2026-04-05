<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment_technician extends Model
{
    protected $fillable=["asset_id" ,"technician_id", "assigned_at", "note"];
     public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function Technician()
    {
        return $this->belongsTo(Technician::class);
    }
}

