<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\PaymentMethod;
use Laravel\Cashier\Payment;

use Auth;
use Cart;

class CartController extends Controller
{
    
    
    function __construct()
    {
        Cart::setGlobalTax(0);


    }
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {  
       
        return view('cart::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function add(Product $product)
    {   
        
        Cart::add($product->id,$product->name,1,$product->sell_price,0,['image' => $product->getProductImgThumb()]);
      
        return redirect()->route('cart.detail');
    }


    public function cartDetail(){

        $carts=Cart::content();
        $user = Auth::user();
        return view('cart::detail')->with( ['carts'=>$carts]);

    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $rowId =$request->input('rowid');
        $qty =$request->input('qty');
        Cart::update($rowId,$qty); 
        response()->json(['status','success']);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $rowId =$request->input('rowid');

        Cart::remove($rowId);

        response()->json(['status','success']);
    }
}
