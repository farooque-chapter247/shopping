<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Order;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\PaymentMethod;
use Laravel\Cashier\Payment;
use Modules\Order\Services\OrderService;
use App\Enums\OrderStatus;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Billing;
use Auth;
use Cart;

class OrderController extends Controller
{

    
    
    protected $service;
    
    
    
    
    function __construct(OrderService $service)
    {
        $this->service = $service;
    }
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $order=new Order;
        $user= Auth::user();
        
        $order=$order::where('user_id',$user->id)->simplePaginate(15);



       
        return view('order.myorder')->with(['myorders'=>$order->load('orderItem') ,'name'=>$user->name]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderPay(Request $request){


        $user = Auth::user();

   
        $paymentid=$request->input('paymentid');

        $stripeCharge = $user->charge(
                     Cart::total()*100,
               
              $paymentid,[
                'currency' => 'usd',
                'description' => "purchasing product",
            ]);


        if( $stripeCharge->status =="succeeded"){

            $order =$this->service->storeOrder($stripeCharge);
            return response()->json(['status'=>$stripeCharge->status ,'id'=>$order->id]);
          
        }else{
            return response()->json(['status'=>$stripeCharge->status]);
        }    
        
  
 
    }

    public function orderDetail(Order $order)
    {
      
        $user= Auth::user();
   
      

       
        return view('order.order-detail')->with(['order'=>$order->load('orderItem.product') ,'name'=>$user->name]);
    }

    public function orderDetailPrint(Order $order)
    {
      
        $user= Auth::user();
   
      

       
        return view('order.order-detail-print')->with(['order'=>$order->load('orderItem.product') ,'name'=>$user->name]);
    }


    public function pay(){

        if(Cart::count()==0){
           return redirect()->route('front');
        }
        $billing=new Billing;
        $user= Auth::user();
    
        return view('order.pay')->with(['billing'=>$billing::where('user_id',$user->id)->orderBy('id', 'desc')->get(),'amount'=>Cart::total()]);
         
    }

    public function saveAddress(Request $request)
    {
            $billing=new Billing;    
            $request=$request->all();

            $user= Auth::user();
            $billing->name=$request['name']??'test';
            $billing->line1=$request['line1']??'test';
            $billing->city=$request['city']??"indore";
            $billing->state=$request['state']??'mp';
            $billing->postal_code=$request['postal_code']??'452001';
            $billing->country=$request['country']??'In';
            $billing->user_id=$user->id;
            $billing->save();
       
            
     
      

            return response()->json(['status'=>'success']);
    }
}

