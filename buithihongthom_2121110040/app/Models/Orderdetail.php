<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = '2121110040_orderdetail';

    protected $fillable = [
        'name',
        'order_id',
        'product_id',
        'price',
        'qty',
        'amount',
    ];
}
