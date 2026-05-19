<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    protected $fillable = [
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
    ];

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
