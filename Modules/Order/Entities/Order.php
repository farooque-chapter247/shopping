<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [];


    // public function products()
    // {
    //     return $this->belongsToMany(\Modules\Product\Entities\Product::class, \Modules\Order\Entities\OrderItem::class);
    // }

     public function orderItem()
    {
        return $this->hasMany(\Modules\Order\Entities\OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getCreatedAtAttribute($date){
       
        return Carbon::parse($date)->format('d-M-Y');
        
    }

}
