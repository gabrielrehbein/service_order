<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    protected $fillable = [
        'customer_id',
        'plate',
        'model',
        'km',
        'year_released',
        'type',
        'brand_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function service_orders(){
        return $this->hasMany(ServiceOrder::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
