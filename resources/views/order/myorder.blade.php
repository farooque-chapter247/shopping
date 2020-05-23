

@extends('layouts.front-layout')

@section('content')
  
<div class="container">
<div class="panel panel-default panel-order mt-5 col-md-8 offset-md-2">
  <div class="panel-heading">
      <strong>Order history</strong>
 
  </div>
  <hr>

<div class="panel-body">

	<div class="col-md-12">	
	@forelse ($myorders as $order)

		<div class="row">
		<div class="col-md-2">
				<a href="javascript:;" class="modal_trigger" data-id="{{$order->id}}">{{$order->order_number}}</a>
			</div>
		<div class="col-md-10">
			<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
				
				
				<label class="label label-danger text-info ">{{$order->status}}</label> </div>
				<span><strong>Order Amount</strong></span> <span class="label label-info">${{$order->total}}</span><br>
				<span>Order Item</span> <span class="label label-info">{{count($order->orderItem)}}</span>

			</div>
			<div class="col-md-12">
				<span class="float-left"> order made on: {{$order->created_at}}</span> <span class="float-right print-open" data-id="{{$order->id}}"><i class="fa fa-print"></i></span>
			</div>
			</div>
		</div>
		</div>
	
	@empty
		<p>No  Order history available</p>
	@endforelse
</div>
	</div>
</div>	

<div id="outprint" style="display:none">

</div>
@endsection

@section('css_after')
<link rel="stylesheet" href="{{asset('css/my-order.css')}}">

@endsection

@section('js_after')

<script src="{{ asset('js/my-order.js') }}"></script>
@endsection
