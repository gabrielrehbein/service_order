<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'name',
        'description',
        'cost_price',
        'sale_price',
        'quantity',
    ];

    public function service_orders() {
        return $this->belongsToMany(ServiceOrder::class);
    }
}
