
@extends('layouts.modal')

@push('modal-title') 
Order Details   @endpush
@push('modal-id','order-detail-customer')


@section('modal-content')
<div class="container">


</div>    
    <div class="container-fluid my-5 d-flex justify-content-center">
      
        <div class="card card-1">
            <div class="card-header bg-white">
                <div class="media flex-sm-row flex-column-reverse justify-content-between ">
                    <div class="col my-auto">
                        <h6 class="mb-0">Order details of ,<span class="change-color">{{$order->user->name}}</span> !</h6>
                    </div>
                    <div class="col-auto text-center my-auto pl-0 pt-sm-4"> 
                        <p class="mb-4 pt-0 Glasses">Order Detail</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h6 class="color-1 mb-0 change-color">Orders</h6>
                    </div>
                    <div class="col-auto "> <small>Order No : {{$order->order_number}}</small> </div>
                </div>

                @foreach($order->orderItem as $item)
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card card-2">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="sq align-self-center ">
                                        <img class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="{{$item->product->getProductImgThumb()}}" /> </div>
                                        <div class="media-body my-auto text-right">
                                            <div class="row my-auto flex-column flex-md-row">
                                                <div class="col-auto my-auto ">
                                                    <h6 class="mb-0">{{$item->product->name}}</h6>
                                                </div>
                                            
                                            
                                                <div class="col my-auto "> <small>Qty : {{$item->quantity}}</small></div>
                                                <div class="col my-auto ">
                                                    <h6 class="mb-0">${{$item->total}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                            
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row mt-4">
                    <div class="col">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <p class="mb-1 text-dark"><b>Order Details</b></p>
                            </div>
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b>Total</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1">${{$order->total}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"> <b></b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1"></p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b></b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1"></p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b></b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1"></p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row invoice ">
                    <div class="col">
              
                        <p class="mb-1">Order Date : {{$order->created_at}}</p>
                        <p class="mb-1">Order No.: {{$order->order_number}}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer">
                <div class="jumbotron-fluid">
                    <div class="row justify-content-between ">
                      
                        <div class="col-auto my-auto ">
                            <h4 class="mb-0 font-weight-bold">TOTAL PAID</h4>
                        </div>
                        <div class="col-auto my-auto ml-auto">
                            <h3 class="display-3 ">${{
                                $order->total
                            }}</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
