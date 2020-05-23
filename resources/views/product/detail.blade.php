@extends('layouts.front-layout')

@section('content')
	<div class="container mt-5">
		<div class="">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{$product->getProductImg()}}" /></div>
						  <!-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
						</div>
						<!-- <ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul> -->
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$product->name}}</h3>
						<!-- <div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div> -->
						<p class="product-description">{{$product->description}}</p>
                        <h4 class="price">MRP: <span > <s class="text-danger">${{$product->actual_price}} </s></span></h4>
						<h4 class="price">our price: <span class="text-success">${{$product->sell_price}}</span></h4>
						<!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> -->
						<div class="action">
							<a  href="{{route('cart.add',$product)}}" class="add-to-cart btn btn-primary" type="button">add to cart</a>
							<!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
						</div>
					</div>
				</div>
			</div>
		</div>


		@if(!$products->isEmpty())
            
                <h3 class="h3"><span class=>Similar Products</span></h3>
                <hr>
                <div class="row">

                    @foreach($products as $product)
                    <div class="col-md-2 col-sm-3">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <a href="{{route('front.product.detail',$product)}}">
                                    <img class="pic-1" src="{{$product->getProductImgThumb()}}">
                                    <img class="pic-2" src="{{$product->getProductImgThumb()}}">
                                </a>
                                <ul class="social">
                                    <li><a href="{{route('front.product.detail',$product)}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <!-- <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> -->
                                    <li><a href="{{route('cart.add',$product)}}" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <a class="add-to-cart" href="{{route('cart.add',$product)}}">Add to cart</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{route('front.product.detail',$product)}}">{{$product->name}}</a></h3>
                                <span class="price">$ {{$product->sell_price}}</span>
                            </div>
                        </div>
                    </div>

                    @endforeach
                
				</div>
			@endif	
	</div>
@endsection

@section('css_after')
<link href="{{asset('css/product-detail.css')}}" rel="stylesheet">
<link href="{{asset('css/front.css')}}" rel="stylesheet">


@endsection

@section('js_after')

@endsection