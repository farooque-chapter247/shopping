@extends('admin.layouts.backend')

@section('content')
    
<!-- Page Content -->
<div class="content">
    {{ Breadcrumbs::render('product.add') }}
    <div class="block">            
        <div class="block-header block-header-default">
            <h3 class="block-title">Add Product</h3>           
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
                                <form data-parsley-validate class="js-validation-bootstrap" action="{{ route('product.add')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('name') is-invalid @enderror">
                                            <label for="name">Name <sup class="text-danger">*</sup></label>
                                            <input type="text" required="" data-parsley-required-message="Name field is rquired" class="form-control" id="name" name="name" required placeholder="Product Name" value="{{old('name')}}">
                                            @error('name')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>    
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group @error('sub_category_id') is-invalid @enderror">
                                                <label for="name">Category<sup class="text-danger">*</sup></label>
                                                <select id="category_id" name="category_id" class="form-control category_id select2 js-select-input">
                                                <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                <select id="sub_category_id"  name="sub_category_id" class="form-control sub_category_id select2 js-select-input">
                                                <option value="">Select SubCategory</option>
                                        
                                                    
                                                </select>      
                                            
                                                @error('sub_category_id')
                                                <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('description') is-invalid @enderror">
                                            <label for="description">Description <sup class="text-danger">*</sup></label>
                                            <textarea class="form-control" required=""  data-parsley-maxlength="1000"  data-parsley-required-message="Description field is rquired."  data-parsley-maxlength-message="Description allow only 150 character." id="description" name="description" required placeholder="Description Here" >{{old('description')}}</textarea>
                                            @error('description')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
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
                                                    class="form-control"  required data-parsley-required-message="Actual price field is rquired." data-parsley-type-message="Price should be in number" data-parsley-type="number" id="actual_price" name="actual_price" placeholder="Actual Price">
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
                                                    <input type="text" data-parsley-lte="#actual_price" class="form-control" required data-parsley-required-message="Sell price field is rquired." data-parsley-type-message="Price should be in number" data-parsley-type="number" id="sell_price" name="sell_price" placeholder="Sell Price">
                                                </div>
                                            </div>    
                                        </div>
                                    
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('skunumber') is-invalid @enderror">
                                            <label for="sell_price">Sku Number <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                            
                                                <input type="text" data-parsley-lte="#skunumber" class="form-control" required data-parsley-required-message="Skunumber field is rquired." id="skunumber" name="skunumber" placeholder="Skunumber">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="category-pic">Product Image </label>
                                        <div class="custom-file">                                                   
                                                    <input type="file"  class="custom-file-input"  id="upload_image" name="file" data-toggle="custom-file-input">
                                                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                        </div>
                                     
                                        <!-- <div id="upload-2-queue" class="queue"></div> -->
                                    </div>
                     
                               
                        
                                    </div>    
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


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<link rel="stylesheet" href="{{asset('css/croppie.css')}}">

@endsection
@section('js_after')
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.min.js')}}"></script>

<script src="{{asset('plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/croppie.js')}}"></script>
<script src="{{asset('js/product.js')}}"></script>


@endsection
