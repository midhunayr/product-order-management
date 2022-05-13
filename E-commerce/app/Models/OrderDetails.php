<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'customer_id',
        'product_id',
        'quantity',
        'total_price',

    ];


    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
}
