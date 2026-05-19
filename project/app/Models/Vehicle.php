<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    protected $fillable = [
        'customer_id',
        'plate',
        'model',
        'brand'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function service_orders(){
        return $this->hasMany(ServiceOrder::class);
    }
}
