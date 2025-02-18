<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{

    protected $fillable = ['postal_code', 'building_name'];


    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
