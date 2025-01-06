<?php

namespace App\Services\UserService;
use App\Models\Product;
use App\ValueObjects\Phone;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;
use Request;

class ProductService 
{
    public function create(Request $request)
    {
        $product = Product::create([]);
    }
}
