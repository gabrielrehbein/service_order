<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    protected $fillable = [
        'name',
        'phone',
        'email',
        'document',
        'person_type',
        'address_id',
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function service_orders(){
        return $this->hasMany(ServiceOrder::class);
    }
}
