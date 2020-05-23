<?php

namespace Modules\Order\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Order;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\PaymentMethod;
use Laravel\Cashier\Payment;
use Modules\Order\Services\OrderService;
use App\Enums\OrderStatus;
use App\Enums\AlertStatusClass;
use App\DataTables\OrdersDataTable;
use App\User;
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
    public function index(Request $request)
    {
        $orderstatus=OrderStatus::toArray();

       
        return view('order::index')->with(['orderstatus'=>$orderstatus ,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    
    public function datatables(OrdersDataTable $datatable ,Request $request)
    {   
      
        $request =$request->all();
        // dd($request['status']);
         return $datatable->list($request);
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

    public function orderDetail(Order $order)
    {
      
        return view('order::order-detail')->with(['order'=>$order->load('orderItem.product','user')]);
    }

    public function OrderStatus(Order $order,Request $request)
    {
        $message ='Opps some error occure !';
        $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_INTERNAL_SERVER_ERROR);
        $request=$request->all();

        if(isset($request['status']))
        {
            $order->status=$request['status'];
            $order->save();
            $message =  'Order Status Successfully';
            $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_OK);
        }
        Session::flash('message',$message); 
        Session::flash('status', $status);

        return redirect()->route('order');
    }

    
}

