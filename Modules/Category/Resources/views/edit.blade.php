@extends('admin.layouts.backend')

@section('content')
    
<!-- Page Content -->
<div class="content">
    {{ Breadcrumbs::render('category.edit',$category) }}
    <div class="block">            
        <div class="block-header block-header-default">
            <h3 class="block-title">Add Category</h3>           
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
                                <form data-parsley-validate class="js-validation-bootstrap" action="{{ route('category.update',$category) }}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                    
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('name') is-invalid @enderror">
                                            <label for="name">Name <sup class="text-danger">*</sup></label>
                                            <input type="text" required="" data-parsley-required-message="Name field is rquired" class="form-control" id="name" name="name" required placeholder="Category Name" value="{{old('name',$category->name)}}">
                                            @error('name')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group @error('description') is-invalid @enderror">
                                            <label for="description">Description <sup class="text-danger">*</sup></label>
                                            <textarea class="form-control" required=""  data-parsley-maxlength="150"  data-parsley-required-message="Description field is rquired."  data-parsley-maxlength-message="Description allow only 150 character." id="description" name="description" required placeholder="Description Here" >{{old('name',$category->description)}}</textarea>
                                            @error('description')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12 col-sm-12">
                                        <label for="category-pic">Category Image </label>
                                        <div class="custom-file">                                                   
                                                    <input type="file" class="custom-file-input" id="example-file-input-custom" name="file" data-toggle="custom-file-input">
                                                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-4 col-sm-12">
                                            <div class="form-group  text-center @error('file') is-invalid @enderror">                                                                   
                                                <div class="choose_file">
                                                <input type="hidden" id="category_id" name="id" value="{{ $category->id }}" />
                                                <input type='file' name='file' id='updatefile' class="d-none" >
                                                    <div id= "preview">

                                                        <img src="{{$category->getCategoryImg()}}" id="preview-image" onclick="$('#updatefile').trigger('click');" alt="" class="img-responsive custom-change-image w-100 avatar">                                               
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

@endsection
@section('js_after')
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.min.js')}}"></script>

<script src="{{asset('plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('js/category.js')}}"></script>


@endsection