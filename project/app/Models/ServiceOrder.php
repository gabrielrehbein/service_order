<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceOrder extends Model {
    protected $fillable = [
        'status',
        'service_value',
        'discount',
        'problem_description',
        'result_description',
        'customer_id',
        'vehicle_id',
        'started_at',
        'finished_at'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'unit_price');
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenance_step(){
        return $this->hasMany(HasMany::class);
    }
}
