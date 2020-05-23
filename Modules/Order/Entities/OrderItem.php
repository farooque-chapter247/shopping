<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [];


    public function product()
    {
        return $this->belongsTo(\Modules\Product\Entities\Product::class);
    }

    function order(){
     
        return $this->belongsTo(\Modules\Order\Entities\Order::class);
        
    }
}
