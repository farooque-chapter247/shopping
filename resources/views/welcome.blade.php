
@extends('layouts.front-layout')

@section('content')

<div class="container mt-5">


        <div class="row">
            <div class="col-md-3 col-offset-3">
            </div>
            <div class="col-md-9 col-offset-3">

                <form action="" method="get">
        
                    <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <div class="form-group">
                            <select name="category_id" class="select2 form-control">
                            <option  value="">Search By category</option>
                                @foreach($dropdown as $category)
                                    <option  value="{{$category->id}}"   @if(isset($request['category_id'])) @if($request['category_id']==$category->id) selected="selected" @endif @endif>{{$category->name}}</option>
                    
                                @endforeach    
                            </select>
                        </div>    


                    </div>
                    <div class="from-group">
                    <input type="text" name="name" value="@if(isset($request['name'])) {{$request['name']}} @endif" class="form-control" placeholder="Search By Product Name">
                    </div>
                    <div class="from-group">
                    <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        
                        <a href="{{ route('front')}}" class="btn btn-danger ml-2" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></a>
</div>  
                    </div>
                    </div>    
                </form>
            </div>    

        </div>
      

        @forelse($categories as $category)
            @if(!$category->products->isEmpty())
            
                <h3 class="h3"><span class=>{{$category->name}} </span> <span class="float-right"><a href="{{ route('front.product.list',$category->id)}}">
                    View All
                </a></span></h3>
                <hr>
                <div class="row">

                    @foreach($category->products as $product)
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

        @empty
                            <div>
                                <center class="text-danger" style="margin: 5em;color: #e32221;"> <!-- Your search did not match any documents ? -->
                                Your search did not match any documents.<br>
                                Suggestions:<br>
                                Make sure that id is present or you have seen before.<br>
                                Make sure that all words are spelled correctly.<br>
                                Try to search by status.<br>
                                Try to search by newer,older, A-Z or Z-A.<br>
                                
                                    </center>
                            </div>       
        @endforelse  
</div>

@endsection

@section('css_after')
<link rel="stylesheet" href="{{asset('css/front.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}">


@endsection

@section('js_after')
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
@endsection