<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
