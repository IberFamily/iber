<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->belongsToMany(Product::class,'order_items','order_id','product_id');
    }
}
