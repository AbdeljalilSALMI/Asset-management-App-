<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply_request extends Model
{
    protected $fillable = [
        'admin_id',
        'supplier_id',
        'asset_name',
        'category',
        'description',
        'status',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
