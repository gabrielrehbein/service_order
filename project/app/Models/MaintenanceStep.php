<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceStep extends Model {
    protected $fillable = [
        'service_order_id',
        'image',
        'description',
    ];

    public function service_order(){
        return $this->belongsTo(ServiceOrder::class);
    }
}
