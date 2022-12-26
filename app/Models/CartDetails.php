<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    protected  $primaryKey = "cart_details_id";
    protected $fillable = [
        "cart_details_id",
        "cart_id",
        "product_id",
        "quantity",
    ];
}
