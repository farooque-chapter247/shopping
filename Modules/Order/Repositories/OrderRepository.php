<?php

namespace Modules\Order\Repositories;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderItem;
use Auth;
use Cart;


class OrderRepository
{
    
    /**
     * Save the change in the model
     *
     * @param  array $data
     * @param  Modules\Order\Entities\Order $Order
     *
     * @return Modules\Order\Entities\Order
     */

    function storeOrder($stripCharges)
	{  
      
        $user = Auth::user();
        $order =new Order;
        $order->order_number=$this->getNextOrderNumber();
        $order->user_id= $user->id;
        $order->transaction_detail=json_encode($stripCharges);
        $order->total=Cart::total();
        $order->save();
        $this->storeOrderItem($order);
        Cart::destroy();
		return $order;
    }

    function storeOrderItem(Order $order)
	{  
  
        $user = Auth::user();
        $carts=Cart::content();
        
        foreach($carts as $item){
            $orderitem=new OrderItem;
            $orderitem->order_id=$order->id;
            $orderitem->product_id=$item->id;
            $orderitem->quantity=$item->qty;
            $orderitem->price=$item->price;
            $orderitem->total=$item->total;
            $orderitem->save();
        

        }
      
		return $order;
    }


    public function getNextOrderNumber()
{
    // Get the last created order
    $lastOrder = Order::orderBy('created_at', 'desc')->first();

    if ( ! $lastOrder )


        $number = 0;
    else 
        $number = substr($lastOrder->order_number, 3);


 
    return 'ORD' . sprintf('%06d', intval($number) + 1);
}


  






}