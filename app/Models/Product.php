<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_code',
        'name',
        'stock',
        'category',
        'sales_unit_price',
        'unit_price',
    ];
}
