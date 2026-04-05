<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
     protected $fillable = [
        'asset_id', 'date', 'technician_id', 'description', 'cost'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }
}
