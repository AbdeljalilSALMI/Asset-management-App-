<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
     protected $fillable = [
        'name', 'serial_number', 'category_id', 'status', 'purchase_date', 'location', 'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
        public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
