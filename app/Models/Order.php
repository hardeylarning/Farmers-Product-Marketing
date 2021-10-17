<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'payment_date', 'shipping_address' , 'total_amount', 'shipping_fee'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product()
    {
       return $this->belongsTo(Product::class);
    }
}
