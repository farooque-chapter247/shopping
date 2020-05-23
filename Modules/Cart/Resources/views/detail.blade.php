
@extends('layouts.front-layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-12">
           <h3 class="float-left">My Cart</h3> 
          @if(count($carts))
            <table class="table table-hover" id="product-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($carts as $item)
                    <tr class="product">
                
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> 
                                <img class="media-object" src="{{ $item->options->image }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body ml-3">
                                <h6 class="media-heading">{{$item->name}}</h6>
                             
                           
                               
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1 product-quantity" style="text-align: center">
                        <input type="number" value="{{$item->qty}}" data-rowId="{{$item->rowId}}" class="form-control"  value="3" min="1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center product-price">{{$item->price}}</td>
                        <td class="col-sm-1 col-md-1 text-center product-line-price total-price-custom">{{$item->total}}</td>
                        <td class="col-sm-1 col-md-1 product-removal" data-rowId="{{$item->rowId}}">
                        <button type="button" class=" btn btn-danger remove-product" data-rowId="{{$item->rowId}}">
                            <span class="fa fa-times " data-rowId="{{$item->rowId}}"></span>
                        </button></td>
                    </tr>

                  @endforeach  
              
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right totals-value" id="cart-subtotal">{{Cart::subtotal()}}</td>
                    </tr>
              
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right totals-value" id="cart-total">{{Cart::total()}}</td>
                    </tr>
                    <tr>
                        <td>   <a  href="{{route('front')}}" class="btn btn-info">
                            <span class="fa fa-shopping-bag"></span> Continue Shopping
                            </a> </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        @guest
                        <a class="float-right btn btn-primary" href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        @else
                        </td>
                        <td>
                        <a href="{{route('order.pay.frontend')}}" class="btn btn-success">
                            Go For payment
</a>
                      @endguest
                      </td>


                    </tr>
                </tbody>
            </table>
            <div class="no-product mt-5 invisible">
                <hr>
                <center>
                    
                  <span class="text-danger">No Product available in cart<br>Please and product & continue shopping.</span><br>
                  <a href="{{route('front')}}" class ="btn btn-primary mt-3"> Back  to <i class ="fa fa-home"> </i> </a>
          
                </center>
            </div>

            @else


              <div class="no-product mt-5">
                  <hr>
                  <center>
                      
                    <span class="text-danger">No Product available in cart<br>Please and product & continue shopping.</span><br>
                    <a href="{{route('front')}}" class ="btn btn-primary mt-3"> Back  to <i class ="fa fa-home"> </i> </a>

                  </center>
              </div> 






            @endif
        </div>
    </div>
</div>



@endsection

@section('css_after')
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">


@endsection

@section('js_after')
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ mix('js/validation/parsley-validation.js') }}"></script>

<script src="{{ asset('js/checkout.js') }}"></script>
@endsection
    

