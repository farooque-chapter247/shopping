@extends('admin.layouts.backend')

@section('content')
    
<!-- Page Content -->
<div class="content">
    {{ Breadcrumbs::render('product.edit',$product) }}
    <div class="block">            
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Product</h3>           
            <div class="block-options">
                <a href="{{ url()->previous() }}" class="btn-block-option js-tooltip-enabled"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Go To Back"><i class="si si-action-undo"></i></a>
            </div>
        </div>
        <div class="block-content">
        <div class="content">          
                <div class="row">
                    <div class="col-md-12">                   
                        <div class="block">                               
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>                        

                            @endif
                            <div class="block-content">
                        
                            
                                <!-- Start Normal Form -->    
                                <form data-parsley-validate class="js-validation-bootstrap" action="{{ route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('name') is-invalid @enderror">
                                            <label for="name">Name <sup class="text-danger">*</sup></label>
                                            <input type="text" required=""  value="{{old('name',$product->name)}}" data-parsley-required-message="Name field is rquired" class="form-control" id="name" name="name" required placeholder="Product Name">
                                            @error('name')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group @error('sub_category_id') is-invalid @enderror">
                                            <label for="name">Category<sup class="text-danger">*</sup></label>
                                            <select  name="category_id" class="form-control category_id select2 js-select-input">
                                            <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ ($product->category_id==$category->id)?'selected="selected"':''}}>{{$category->name}}</option>
                                                 @endforeach
                                                
                                            </select>      
                                          
                                            @error('category_id')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group @error('sub_category_id') is-invalid @enderror">
                                            <label for="name">Sub Category<sup class="text-danger">*</sup></label>
                                            <select  name="sub_category_id" class="form-control sub_category_id select2 js-select-input">
                                            <option>Select SubCategory</option>
                                            <option value="{{ $product->subCategory->id}}" selected="selected">{{$product->subCategory->name}}</option>
                                                
                                            </select>      
                                          
                                            @error('sub_category_id')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('description') is-invalid @enderror">
                                            <label for="description">Description <sup class="text-danger">*</sup></label>
                                            <textarea class="form-control" required=""  data-parsley-maxlength="1000"  data-parsley-required-message="Description field is rquired."  data-parsley-maxlength-message="Description allow only 150 character." id="description" name="description" required placeholder="Description Here" >{{old($product->description ,$product->description)}}</textarea>
                                            @error('description')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group @error('sell_price') is-invalid @enderror">
                                            <label for="sell_price">Actual Price <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                </div>
                                                <input type="text" 	
                                                  class="form-control"  required data-parsley-required-message="Actual price field is rquired." data-parsley-type-message="Price should be in number" value="{{old('actual_price',$product->actual_price)}}" data-parsley-type="number" id="actual_price" name="actual_price" placeholder="Actual Price">
                                            </div>
                                        </div>    
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group @error('sell_price') is-invalid @enderror">
                                            <label for="sell_price">Sell Price <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                </div>
                                                <input type="text" data-parsley-lte="#actual_price" class="form-control" required data-parsley-required-message="Sell price field is rquired." value="{{ old('sell_price',$product->sell_price ) }}" data-parsley-type-message="Price should be in number" data-parsley-type="number" id="sell_price" name="sell_price" placeholder="Sell Price">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('skunumber') is-invalid @enderror">
                                            <label for="sell_price">Sku Number <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                            
                                                <input type="text" data-parsley-lte="#skunumber" class="form-control" required data-parsley-required-message="Skunumber field is rquired." value="{{old($product->skunumber,'skunumber')}}" id="skunumber" name="skunumber" placeholder="Skunumber">
                                            </div>
                                        </div>    
                                    </div>
                                   
                                    <div class="col-lg-4 col-sm-12">
                                            <div class="form-group  text-center @error('file') is-invalid @enderror">                                                                   
                                                <div class="choose_file">
                                                <input type="hidden" id="product_id" name="id" value="{{ $product->id }}" />
                                                <input type='file' name='file' id='updatefile' class="d-none" >
                                                    <div id= "preview">

                                                        <img src="{{$product->getProductImg()}}" id="preview-image" onclick="$('#updatefile').trigger('click');" alt="" class="img-responsive custom-change-image w-100 avatar">                                               
                                                    </div>
                                                   <p class="mt-3 text-center">Upload Profile Image</p>
                                                </div>                                                
                                                @error('file')
                                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                
                                            </div>
                                                                                    
                                    </div>  
                     
                               
                                </div>

                                    <br>
                     
                               
                        

                                    <br>

                                   
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-alt-primary">Save</button>
                                    
                                            <a href="{{ url()->previous() }}" class="btn btn-alt-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Normal Form -->
                            </div>
                        </div>                    
                    </div>
                </div>
            </div> 

        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
@section('css_after')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}">

@endsection
@section('js_after')
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.min.js')}}"></script>

<script src="{{asset('plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/product.js')}}"></script>


@endsection
